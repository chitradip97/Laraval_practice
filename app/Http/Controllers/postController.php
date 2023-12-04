<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;

class postController extends Controller
{
   public function index():View{
    $posts=Post::all();
    return view('model_view.all')->with(['info'=>$posts]);
   }
   public function show($id):View{
    $post=Post::find($id);
    return view('model_view.show')->with(['post'=>$post]);
   } 

   public function loadform():View
{
    return view('model_view.add');
}
   public function add(Request $req)
   {
    $title=$req->input('t1');
    $desc=$req->input('t2');
    $newPost= new Post();
    $newPost->title=$title;
    $newPost->description=$desc;
    $newPost->save();
    return redirect("/alldata")->with(['messege'=>'inserted successfully']);
   }
}
