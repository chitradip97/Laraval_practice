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

   public function delete($id)
   {
      Post::whereId($id)->delete();
      return redirect("/alldata")->with('messege','post has been deletedsuccessfully');
   }

   public function edit($id):View{
      $post=Post::findOrFail($id);
      return view('model_view.edit')->with(['post'=>$post]);
   }

   public function update(Request $req)
   {
      $editTitle=$req->input('editTitle');
      $editDesc=$req->input('editDesc');
      $id=$req->input('hid');
      $updateData=['title'=>$editTitle,'description'=>$editDesc];
      Post::whereId($id)->update($updateData);
      return redirect('/alldata')->with(['messege'=>'one post updated successfully']);
   }
}
