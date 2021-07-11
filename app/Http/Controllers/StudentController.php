<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    function login(Request $req){
        $user = Student::where(["adm_no"=>$req->adm_no])->first();
        $a = $req->input();
        if($user && Hash::check($req->password,$user->password)){
            $req->session()->put('student',$a['adm_no']);
            return redirect("/");
        }
        else{
            return "<h3>Email and Password does not match. <br><br><button onclick=\"window.location.href='student_login';\">Back to login</button></h3>";
        }
    }

    function signup(Request $req){
        $req->validate([
            'name' => 'required',
            'adm_no'=>'required',
            'password'=>'required|min:8',
            'cpassword'=>'required_with:password|same:password|min:8',
            'email' => 'required',
        ]);
        $student = new student;
        $student->name = $req->name;
        $student->adm_no = $req->adm_no;
        $student->password = Hash::make($req->password);
        $student->email = $req->email;
        $student->book_num = 5;
        $student->fine = 0;
        $student->save();
        return redirect('student_login');
    }
}
