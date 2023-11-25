<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\BatchController;
use App\http\controllers\FormController;
use App\http\controllers\DataController;
use App\http\controllers\DbController;
use App\http\controllers\crudController;
use App\http\controllers\loginController;
use App\http\controllers\AjaxController;
use App\http\controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/batch1',[BatchController::class,'index']);
Route::get('/batch2',[BatchController::class,'show']);
Route::get('/batch3',[BatchController::class,'showmsg']);
Route::get('/batch4',[BatchController::class,'showdata']);


Route::get('/filldata',[FormController::class,'index']);
Route::post('/register',[FormController::class,'showdata']);

Route::get('/triangleinput',[FormController::class,'input']);
Route::post('/triangleoutput',[FormController::class,'showTringledata']);


Route::get('/register',[DataController::class,'register']);
Route::post('/submit',[DataController::class,'submit']);

// database
// get all data
Route::get('/all',[DbController::class,'all']);
// search data basedon id
Route::get('/showdata/{id}',[DbController::class,'show']);

Route::get('/insert',[DbController::class,'insert']);
Route::post('/submitdata',[DbController::class,'submit']);

Route::get('/delete/{id}',[DbController::class,'delete']);

Route::get('/edit/{id}',[DbController::class,'edit']);
Route::post('/update',[DbController::class,'update']);


// crud app
// insert data
Route::get('/insert_crud',[crudController::class,'insert_view']);
Route::post('/submit_crud',[crudController::class,'submit']);
// view data
Route::get('/view_crud',[crudController::class,'view_crud']);
Route::post('/update_view_ini/{id}',[crudController::class,'update_view']);
// delete data
Route::get('/delete_crud/{id}',[crudController::class,'delete_crud']);
// Update data
Route::get('/update_view',[crudController::class,'update_view']);

Route::post('/update_crud/{id}',[crudController::class,'update_crud']);


// login form
// view registerpage
Route::get('/register_form',[loginController::class,'register']);
// insert data to database
Route::post('/register',[loginController::class,'submit']);
// view loginpage
Route::get('/login_form',[loginController::class,'login']);
// insert data to database
Route::post('/login_verify',[loginController::class,'login_submit']);
// home
Route::get('/home',[loginController::class,'home_view']);


// ajax
Route::get('/hello',[AjaxController::class,'index']);
Route::post('/submit',[AjaxController::class,'ajax_response']);

//Todo Controller Ajax
// todo fetch
Route::get('/showtodos',[TodoController::class,'index']);
Route::get('/fetchall',[TodoController::class,'getAllTodos']);
// todo search
Route::get('/find',[TodoController::class,'getinfo']);
Route::post('/findinfo',[TodoController::class,'showinfo']);
// todo insert
Route::get('/insert_todo',[TodoController::class,'insert_todo']);
Route::post('/insert_backend',[TodoController::class,'insert_crud']);
// todo delete 
Route::get('/delete_todo',[TodoController::class,'delete_todo']);
Route::post('/delete_backend',[TodoController::class,'delete_crud']);
// todo update
Route::get('/update_todo',[TodoController::class,'update_todo']);
Route::post('/update_backend',[TodoController::class,'update_crud']);
// todo view
Route::get('/view_todo',[TodoController::class,'view_crud']);
// edit option
Route::post('/edit_backend/{id}',[TodoController::class,'edit_backend']);
// update todo
Route::post('/update_todo_app/{id}',[TodoController::class,'update']);
//Route::post('/view_backend/{id}', 'PostsController@approve');



