<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\bookreq;
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
            return redirect("/books");
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
            'cpassword'=>'required_with:password|same:password',
            'email' => 'required',
        ]);
        $student = new student;
        $student->name = $req->name;
        $student->adm_no = $req->adm_no;
        $student->password = Hash::make($req->password);
        $student->email = $req->email;
        $student->book_num = 3;
        $student->bid1 = 0;
        $student->bid2 = 0;
        $student->bid3 = 0;
        $student->fine = 0;
        $student->save();
        return redirect('student_login');
    }

    function students(){
        $data = Student::select("*")->get();
        return view('students',['student'=>$data]);
    }

    function profile($adm){
        $data = Student::where(["adm_no"=>$adm])->first();
        $book=bookreq::join('books', 'books.bid', '=', 'requests.rbid')
        ->where('status','=','approved')
        ->orWhere('status','=','requested')
        ->get();
        $book = $book->where('sadm_no','=',$adm);
        return view('profile',['data'=>$data,'book'=>$book]);
    }
}
