<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    //fetch all data from table
    public function all():View{
        $users=DB::table('user')->get();
        return view('crud/all')->with(['users'=>$users]);
    }

    // search data using id

    public function show($id)
    {
        $user_id=$id;
        $user=DB::table('user')->where('id','=',$user_id)->get();
        return view('crud/dbshow')->with(['user'=>$user[0]]);
    }
    
    public function insert():View
    {
        return view('crud/insert');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'nm'=>'required|min:3|max:8',
            'ag'=>'required|integer|between:18,25',
            'gen'=>'required',
            'lang'=>'required',
           
            'avatar'=>'required|max:10000|mimes:jpg,png,jif,jpeg,docs,pdf,xslx'

        ]);
        $name=$request->input('nm');
        $age=$request->input('ag');
        $gen=$request->input('gen');
        $langspk=$request->input('lang');
        //$langdetail=$request->input('lang');
        $langdetail=implode(',',$langspk);
        $file=$request->file('avatar');
        $filename=time().'_'.$file->getclientOriginalName();
        $location='uploads';
        $file->move($location,$filename);

        $data=[
            'name'=>$name,
            'age'=>$age,
            'gender'=>$gen,
            'language'=>$langdetail,
            'profile_pic'=>'uploads/'.$filename
        ];
        DB::table('user')->insert($data);
        return view('crud/insert')->with(['info'=>'Profile inserted Successfully']);
        
    }

    public function delete($id)
    {
        $user=DB::table('user')->where('id',$id)->get();
        $old_profile_pic_path=$user[0]->profile_pic;
        unlink($old_profile_pic_path);
        $affectedRows=DB::table('user')
        ->where('id',$id)
        ->delete();
        if($affectedRows==1)
            return redirect('/all')->with('messege','deleted');
        else
            return redirect('/all')->with('message','error102');
    }
    public function edit($id)
    {
        $user_id=$id;
        $user=DB::table('user')->where('id','=',$user_id)
                                ->get();
                   
        return view('crud/edit')->with(['user'=>$user[0]]);            
                        
                    
    }
    public function update(Request $request)
    {
        $hid=$request->input('hid');
        $editName=$request->input('editname');
        $editAge=$request->input('editAge');
        $editgen=$request->input('editgen');
        $editlang=$request->input('lang');
        $editlang_mod=implode(",",$editlang);
        $affectedRows=DB::table('user')->where('id','=',$hid)
                                        ->update([
                                            'name'=>$editName,
                                            'age'=>$editAge,
                                            'gender'=>$editgen,
                                            'language'=>$editlang_mod,
                                        ]);
        if($affectedRows==1)
        {
            return redirect('/all')->with('message',"updated");
        }
        else
        {
            return redirect('/all')->with('message',"error101");
        }
    }
}
