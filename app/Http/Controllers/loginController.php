<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function register():View{
        
        return view('loginapp/register');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'unm'=>'required|min:3|max:15',
            'pass'=>'required',
            'em'=>'required',
            'loc'=>'required',
        ]);
           
            

        $name=$request->input('unm');
        $password=$request->input('pass');
        $email=$request->input('em');
        $location=$request->input('loc');
        $email_str="'".$email."'";
        

        $data=[
            'name'=>$name,
            'password'=>$password,
            'email'=>$email,
            'location'=>$location
        ];
        //$affectedrows=array();
         $affectedrows=DB::table('user_login')->where('email','=',$email)->first();
         if(isset($affectedrows))
         {
            return view('loginapp/register')->with(['info'=>'Your data is already in database']);
         }
         else
         {
            DB::table('user_login')->insert($data);
            return view('loginapp/login')->with(['info'=>'You are successfully registerd']);
         }
         
         //$affectedrows = DB::table('user_login')->where('email','=',$email_str)->first();
         //$affectedrows = User::where('email', Input::get($email_str))->get()->first();
        //  foreach($affectedrows as $data)
        //  {
        //      if(($data->name)==$email_str)
        //      {
        //          return view('loginapp/register')->with(['info'=>'Your data is already in database']); 
        //      }
        //      else
        //  {
        //      DB::table('user_login')->insert($data);
        //      return view('loginapp/login')->with(['info'=>'You are successfully registerd']);
        //  }
        // }

        //     else
        //    {
            //if(empty($affectedrows))
            //if(array_key_exists('$name_str', $affectedrows))
           // if($affectedrows)
            //if($affectedrows->isEmpty())
            // if (DB::table('user_login')->where('email','=',$email_str)->first())
            // {
            //     return redirect('/register_form')->with('info',"Your data is already in database");
             
            
             
            
            //  }
            //  else
            //  {
            //     DB::table('user_login')->insert($data);
            //     return redirect('/login_form')->with('info',"You are successfully registerd");
                
            //     return view('loginapp/register')->with(['info'=>'Your data is already in database']);
            //  }
             

        // }
        // if($affectedrows==1)
        // {
            
        // }
        // else
        // {
        //     DB::table('user_login')->insert($data);
        //     return view('loginapp/login')->with(['info'=>'You are successfully registerd']);
        // }
            
        
        
    }

     public function login():View{
        
         return view('loginapp/login');
     }

    public function login_submit(Request $request)
    {
        $request->validate([
            'userem'=>'required',
            'userpass'=>'required'
        ]);
        $email=$request->input('userem');
        $password=$request->input('userpass');
        $email_str="'".$email."'";
        $password_str="'".$password."'";


        // $affectedrows=DB::table('user_login')->where([
        //                                               ['email','=',$email_str],
        //                                               ['password','=',$password_str]
        //                                             ])->get();
         $affectedrows=DB::table('user_login')->where('email','=',$email)
                                              ->where('password','=',$password)->first();
          
    //      $user1=DB::table('users1')
    //                                 ->where('email','=',$em1)
    //                                 ->where('password','=',$pwd1)->get();

    //   if(!$user1->isEmpty()) 
    //   {
    //     return view('home')->with(['user1'=>$user1[0]]);
    //   } 
    //   else 
    //   {
    //     return redirect('/method1')->with(['error'=>'Invalid credentails']);
    //   }
                                   
                                                      
        //  $user1=DB::table('users1')
        //                         ->where('email','=',$em1)
        //                                             ->where('password','=',$pwd1)->get();
                                              
            //if(isempty($affectedrows))
            //f(!$user1->isEmpty()) 
        //     print_r($affectedrows);
             if(isset($affectedrows))
          {
             return view('loginapp/home')->with(['users'=>$email]);
            
          }
          else{
             return redirect('/login_form')->with(['info'=>'You entered invalid credential']);
          
          }

        //  if(DB::table('user_login')->where('email','=',$email_str)->where('password','=',$password_str)->first())
        //     {
        //     return redirect('/home')->with('message','Welcome to home page');
        //     }
        //     else
        //     {
        //     return redirect('/login_form')->with(['info'=>'You entered invalid credential']);
              
        //      }

            // if (User::where([
            //     ['name','=',$name_str],
            //     ['password','=',$password_str]
            //   ], Input::get('email'))->count() > 0)
            //  {
            //     redirect('/login_form')->with(['info'=>'Your data is already in the system']);
            //  }
            //  else{
            //     redirect('/home')->with('messege','Welcome to home page');
            //  }

        // print_r($affectedrows) ;
        // foreach ($affectedrows as $title) {
        //     echo ($title) ;
        // }
        // if($affectedrows==null)
        // {
        //     return view('loginapp/login')->with(['info'=>'You entered wrong credential']);
        // }
        // else{
        //     redirect('/home')->with('messege','Welcome to home page');
        // }
            
           
            

       
        
        

        // $data=[
        //     'name'=>$name,
        //     'password'=>$password,
        //     'email'=>$email,
        //     'location'=>$location
        // ];
            
        // DB::table('user_login')->insert($data);
        // return view('loginapp/register')->with(['info'=>'You are successfully registerd']);
        
    }
    public function home_view():View{
        
        return view('loginapp/home');
    }
}
