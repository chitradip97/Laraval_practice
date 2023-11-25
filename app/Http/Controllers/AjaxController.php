<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function index():View{
        return view('ajax.text_calc');
    }
    public function ajax_response(Request $request)
    {
        $str=$request->input('param1');
        echo "<p>Original string".$str."<p>";
        echo "<p>Size of the string".strlen($str)."</p>";
    }
}
