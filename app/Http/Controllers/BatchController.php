<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BatchController extends Controller
{
    public function index()

    {
        return"<h3>welcome to laravel 10 application</h3>";
    }
    public function show():View
    {
        return view('batchnew');
    }
    public function showmsg():View
    {
        return view('batchnew')
        ->with(['name'=>'sourav','age'=>37,'dept'=>'computer']);
    }

    public function showinfo():View
{
    $emp=[['id'=>'e001','name'=>'sourav','loc'=>'kokata','dept'=>'computer science'],
    ['id'=>'e002','name'=>'sumit','loc'=>'howrah','dept'=>'electrical'],
    ['id'=>'e003','name'=>'Raju','loc'=>'kokata','dept'=>'eletronics']
        ];
    

    return view('empshow')->with(['info'=>$emp]);
}
}




