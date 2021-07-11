<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
Route::view("/","home");


Route::post("/student_signup",[StudentController::class,'signup']);
Route::post("/student_login",[StudentController::class,'login']);

Route::get("/logout",function(){
    Session::forget('student');
    return redirect('student_login');
});