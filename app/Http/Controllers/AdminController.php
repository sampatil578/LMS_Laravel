<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    function login(Request $req){
        $user = Admin::where(["username"=>$req->username])->first();
        $a = $req->input();
        if($user && Hash::check($req->password,$user->password)){
            $req->session()->put('admin',$a['username']);
            return redirect("/");
        }
        else{
            return "<h3>Username and Password does not match. <br><br><button onclick=\"window.location.href='student_login';\">Back to login</button></h3>";
        }
    }

    function signup(Request $req){
        $req->validate([
            'name' => 'required',
            'username'=>'required',
            'password'=>'required|min:8',
            'cpassword'=>'required_with:password|same:password',
            'email' => 'required',
        ]);
        $admin = new Admin;
        $admin->name = $req->name;
        $admin->username = $req->username;
        $admin->password = Hash::make($req->password);
        $admin->email = $req->email;
        $admin->save();
        return redirect('admin_login');
    }
}
