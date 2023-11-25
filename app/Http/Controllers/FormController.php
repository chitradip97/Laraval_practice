<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
  public function index():View
  {
    return view('register');
  }  

  public function showdata(Request $request)
  {
    $nm=$request->input('unm');
    $ag=$request->input('age');
    $lc=$request->input('loc');
    return view('formview')->with(['name'=>$nm,'age'=>$ag,'loc'=>$lc]);
  }


  public function input():View
  {
    return view('triangle_ip_val');
  }
  public function showTringledata(Request $request)
  {
    $length=$request->input('len');
    $breath=$request->input('br');
    $height=$request->input('ht');
    $Area=$length*$breath;
    $volumn=$length*$breath*$height;

    return view('triangle_view')->with(['area'=>$Area,'volumn'=>$volumn]);
  }
}
