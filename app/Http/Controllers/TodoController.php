<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index():View{
        return view('ajax.todo.all');
    }
    public function getAllTodos(){
        $todos=DB::table('todos')->get();
        return response()->json($todos)  ;
    }

    public function getinfo():View
    {
        return view('ajax.todo.search');
    }
    public function showinfo(Request $request)
    {
        $tid=$request->input('tskid');
        $info=DB::table('todos')->where('id','=',$tid)->get();
        if(DB::table('todos')->where('id','=',$tid)->get()->count()==1)
        {
            return response()->json(['active'=>1,'data'=>$info]);
        }
        else{
            return response()->json(['active'=>0]);
        }
    }

    
    
        public function insert_todo():View
    {
        return view('ajax.todo.insert');
    }
        public function insert_crud(Request $request)
        {
             $request->validate([
                //  'uid'=>'required',
                //  'utitle'=>'required',
                 'udesc'=>'min:10|max:100',
             ]);

            $userid=$request->input('uid');
            $usertitle=$request->input('utitle');
            $dercription=$request->input('udesc');
            $data=[
                'id'=>$userid,
                'title'=>$usertitle,
                'descripton'=>$dercription
            ];
            DB::table('todos')->insert($data);
            // if(DB::table('todos')->where('id','=',$userid)->get()->count()==1)
        // {
            return response()->json(['active'=>1]);
        // }
        // else
        // {
        //     return response()->json(['active'=>0]);
        // }




        }

        public function delete_todo():View
        {
            return view('ajax.todo.delete');
        }
        public function delete_crud(Request $request)
        {
            //  $request->validate([
            //     //  'uid'=>'required',
            //     //  'utitle'=>'required',
            //      'udesc'=>'min:10|max:100',
            //  ]);

            $userid=$request->input('uid');
            $usertitle=$request->input('utitle');
            $dercription=$request->input('udesc');
            $data=[
                'id'=>$userid,
                'title'=>$usertitle,
                'descripton'=>$dercription
            ];
            $affectedRows=DB::table('todos')
                            ->where('id',$userid)
                            ->delete();
           // DB::table('todos')->delete($data);
             if($affectedRows>0)
         {
            return response()->json(['active'=>1,'message'=>'delete success']);
         }
         else
         {
             return response()->json(['active'=>0,'message'=>'delete failed']);
         }




        }
        public function update_todo():View
        {
            return view('ajax.todo.update');
        }
        public function update_crud(Request $request)
        {
            

            $userid=$request->input('uid');
            $usertitle=$request->input('utitle');
            $dercription=$request->input('udesc');
            $data=[
                'id'=>$userid,
                'title'=>$usertitle,
                'descripton'=>$dercription
            ];
           // DB::table('todos')->insert($data);
            $affectedRows=DB::table('todos')
       ->where('id',$userid)
       ->update(['title' => $usertitle,'descripton'=>$dercription]);
             if(DB::table('todos')->where('id','=',$userid)->get()->count()==1)
         {
            return response()->json(['active'=>1]);
         }
         else
         {
             return response()->json(['active'=>0]);
         }




        }

        public function view_crud():View{
            $p_data=DB::table('todos')->get();
            return view('ajax.todo.view')->with(['all_data'=>$p_data]);
        }
        public function edit_backend(Request $request,$id){
           // dd($request);
            //$id=$request->input('tskid');
            
         $info=DB::table('todos')->where('id','=',$id)->get();
         if(DB::table('todos')->where('id','=',$id)->get()->count()==1)
         {
             return response()->json(['data'=>$info]);
         }
        //  else{
        //      return response()->json(['active'=>0]);
        //  }

        }
        
    
    
}
