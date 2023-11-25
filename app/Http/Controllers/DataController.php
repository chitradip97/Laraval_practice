<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DataController extends Controller
{
    public function register():View
    {
        return view('create');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'nm'=>'required|min:3|max:8',
            'ag'=>'required|integer|between:18,25',
            'gen'=>'required',
            'lang'=>'required',
            'em'=>'required',
            'edu'=>'required',
            'avatar'=>'required|max:10000|mimes:jpg,png,jif,jpeg,docs,pdf,xslx',

        ]);
        $name=$request->input('nm');
        $age=$request->input('ag');
        $gen=$request->input('gen');
        $langspk=$request->input('lang');
        //$langdetail=$request->input('lang');
        $langdetail=implode(',',$langspk);
        $email=$request->input('em');
        $deg=$request->input('edu');
        $degree=implode(',',$deg);
        // $gen=$request->input('ag');


        $file=$request->file('avatar');
        $filename=time().'_'.$file->getClientOriginalName();
        $location='uploads';
        $file->move($location,$filename);


        $info=[
            'name'=>$name,
            'age'=>$age,
            'gender'=>$gen,
            'langdtl'=>$langdetail,
            'email'=>$email,

            'degree'=>$degree,
            'profile_pic'=>'uploads/'.$filename
        ];
        return view('show')->with(['userinfo'=>$info]);
    }

    

}

