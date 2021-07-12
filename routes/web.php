<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view("/student_signup","student_signup");
Route::view("/student_login","student_login");
Route::view("/admin_login","admin_login");
Route::view("/addadmin","addadmin");
Route::view("/addbooks","addbooks");
Route::view("/","home");


Route::post("/student_signup",[StudentController::class,'signup']);
Route::post("/student_login",[StudentController::class,'login']);
Route::get("/students",[StudentController::class,'students']);
Route::post("/admin_login",[AdminController::class,'login']);
Route::post("/addadmin",[AdminController::class,'signup']);
Route::post("/addbooks",[BooksController::class,'addbook']);
Route::get("/books",[BooksController::class,'books']);

Route::get("/logout",function(){
    if(session('student')){
        Session::forget('student');
        return redirect('student_login');
    }
    if(session('admin')){
        Session::forget('admin');
        return redirect('admin_login');
    }
});