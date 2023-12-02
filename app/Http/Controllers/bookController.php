<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    public function index():View{
        return view('exam_3.publish');
   }

   public function getAllData(){
       $info  = DB::table('publisher_info')->get();
       //echo $todos;
       return response()->json($info);


   }
   public function insert_show():View{
    return view('exam_3.insert');
    }

    public function submit_data(Request $request)
    {
        
         $book_id=$request->input('book_id');
         $Book_nm=$request->input('Book_nm');
         $Book_author=$request->input('Book_author');
         $Pub_code=$request->input('Pub_code');
         $Pub_name=$request->input('Pub_name');
         $Pub_Address=$request->input('Pub_Address');
         $Pub_cost=$request->input('Pub_cost');
         
        
         $book_data=[
             'book_id'=>$book_id,
             'Book_nm'=>$Book_nm,
             'Book_author'=>$Book_author,
             'Pub_code'=>$Pub_code
             
         ];
         $pub_data=[
            'Pub_code'=>$Pub_code,
            'Pub_name'=>$Pub_name,
            'Pub_Address'=>$Pub_Address,
            'Pub_cost'=>$Pub_cost
            
        ];
         DB::table('book_info')->insert($book_data);
         DB::table('publisher_info')->insert($pub_data);
         return view('exam_3/insert')->with(['info'=>'data inserted Successfully']);


    }
     function search_data(Request $request){
         $book_id=$request->input('book_id');
         $book_data=DB::table('book_info')->where('Book_id','=',$book_id)->get();
         foreach($book_data as $data)
         {
            $book_id_str=$data->Book_id;
            $Book_name=$data->Book_nm;
            $Book_author=$data->Book_author;
            $Pub_code=$data->Pub_code;
         }
         //$Book_id=
         $pub_data=DB::table('publisher_info')->where('Pub_code','=',$Pub_code)->get();
         foreach($pub_data as $data)
         {
            $Pub_name=$data->Pub_name;
            $Pub_Address=$data->Pub_Address;
            $Pub_cost=$data->Pub_cost;
         }
         $all_data=[
            'book_id'=>$book_id_str,
            'Book_name'=>$Book_name,
            'Book_author'=>$Book_author,
            'Pub_code'=>$Pub_code,
            'Pub_name'=>$Pub_name,
            'Pub_Address'=>$Pub_Address,
            'Pub_cost'=>$Pub_cost

         ];

         return view('exam_3/insert')->with(['all_data'=>$all_data,'book_id'=>$book_id_str,'Book_name'=>$Book_name,'Book_author'=>$Book_author,'Pub_code'=>$Pub_code,'Pub_name'=>$Pub_name,'Pub_Address'=>$Pub_Address,'Pub_cost'=>$Pub_cost]);
        

     }
     
}
