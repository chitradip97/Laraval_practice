<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class crudController extends Controller
{
    public function insert_view():View
    {
        return view('crud app/insert');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'emp_nm'=>'required|min:3|max:20',
            'emp_pass'=>'required|min:3|max:8',
            'emp_gen'=>'required',
            'emp_join'=>'required',
            'emp_loc'=>'required',
            'emp_dpt'=>'required',
            'emp_typ'=>'required',
            'avatar'=>'required'

        ]);
         $name=$request->input('emp_nm');
         $pass=$request->input('emp_pass');
         $gen=$request->input('emp_gen');
         $join_date=$request->input('emp_join');
         $location=$request->input('emp_loc');
         $dept=$request->input('emp_dpt');
         $type=$request->input('emp_typ');
         $img_avatar=$request->file('avatar');
         $filename=time().'_'.$img_avatar->getclientOriginalName();
         $data_location='crud_uploads';
         $img_avatar->move($data_location,$filename);
         $data=[
             'emp_name'=>$name,
             'emp_password'=>$pass,
             'emp_Gender'=>$gen,
             'emp_join_date'=>$join_date,
             'emp_location'=>$location,
             'emp_department'=>$dept,
             'emp_type'=>$type,
             'avatar'=>'crud_uploads/'.$filename
         ];
         DB::table('crud_emp_data')->insert($data);
         return view('crud app/insert')->with(['info'=>'Profile inserted Successfully']);


    }
    //fetch all data from table
    public function view_crud():View{
        $emp_data=DB::table('crud_emp_data')->get();
        return view('crud app/view')->with(['employes'=>$emp_data]);
    }
    // delete data
    public function delete_crud($id)
    {
        $employee=DB::table('crud_emp_data')->where('emp_id',$id)->get();
         $old_profile_pic_path=$employee[0]->avatar;
         unlink($old_profile_pic_path);
        $affectedRows=DB::table('crud_emp_data')
        ->where('emp_id',$id)
        ->delete();
        if($affectedRows==1)
            return redirect('view_crud')->with('messege','deleted');
        else
            return redirect('view_crud')->with('message','error102');
    }


    public function update_view($id)
    {   $less_id_emp=DB::table('crud_emp_data')->where('emp_id','<',$id)->get();
        $emp_data=DB::table('crud_emp_data')->where('emp_id','=',$id)->get();
        $greater_id_emp=DB::table('crud_emp_data')->where('emp_id','>',$id)->get();
        return view('crud app/update_view')->with(['employes'=>$emp_data,'less_employes'=>$less_id_emp,'greater_employes'=>$greater_id_emp]);
    }

    public function update_crud(Request $request,$id)
    {
        
        
        
        $emp_nm =$request->input("emp_nm") ;
        $emp_gen=$request->input("emp_gen");
        $emp_join=$request->input("emp_join");
        $emp_loc=$request->input("emp_loc");
        $emp_dpt=$request->input("emp_dpt");
        $emp_typ=$request->input("emp_typ");

        $employee=DB::table('crud_emp_data')->where('emp_id',$id)->get();
        
       $affectedRows=DB::table('crud_emp_data')
       ->where('emp_id',$id)
       ->update(['emp_name' => $emp_nm,'emp_Gender'=>$emp_gen,'emp_join_date'=>$emp_join,'emp_location'=>$emp_loc,'emp_department'=>$emp_dpt,'emp_type'=>$emp_typ]);
       //if($affectedRows==1)
            // $emp_data=DB::table('crud_emp_data')->get();
            // return view('crud app/view')->with(['employes'=>$emp_data]);
           return redirect('view_crud')->with('messege','Updated');
    //    else
    //        return redirect('/view_crud')->with('message','error102'); 
    }
    
}
