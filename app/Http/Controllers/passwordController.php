<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class passwordController extends Controller
{
    public function signin():View{
        return view('ajax.pw_veryfication.user');
    }
    public function addUser(Request $req)
    {
        $hashedPass= password_hash($req->input('pass1'),PASSWORD_DEFAULT);
        $data=[
            'name'=>$req->input('name'),
            'phone'=>$req->input('phone'),
            'email'=>$req->input('email'),
            'password'=>$hashedPass
        ];
        $affectedRows=DB::table('userinfo')->insert($data);
        if($affectedRows)
        return response()->json(['message'=>'success']);
        else
        return response()->json(['message'=>'error']);
    }

    public function login(Request $req)
    {
        $username=$req->input('username');
        $password=$req->input('pass1');
        $userInfo=DB::table('userinfo')->where('email','=',$username)->get();
        if(count($userInfo)==1)
        {
            $old_db_pass=$userInfo[0]->password;
            $check= password_verify($password,$old_db_pass);
            if($check)
            {
                date_default_timezone_set("asia/kolkata");
                $loginTime=date('d-m-y h:i:sA');
                return response()->json([
                    'message'=>'success',
                    'userActive'=>$userInfo[0]->name,
                    'loginTime'=>$loginTime,
                    'IP'=>$req->ip(),
                    'user_id'=>$userInfo[0]->idate
                ]);
            }
            else
            return response()->json(['message'=>'invalid password.!']);
        }
        else{
            return response()->json(['message'=>'Such user does not exist.!']);
        }
    }

}
