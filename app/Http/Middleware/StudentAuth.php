<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path()=="student_login" && ($request->session()->has('student')||$request->session()->has('admin'))){
            return redirect("/books");
        }
        if($request->path()=="student_signup" && ($request->session()->has('student')||$request->session()->has('admin'))){
            return redirect("/books");
        }
        if($request->path()=="admin_login" && ($request->session()->has('student')||$request->session()->has('admin'))){
            return redirect("/books");
        }
        if($request->path()=="addadmin" && !$request->session()->has('admin')){
            return redirect("/books");
        }
        if($request->path()=="addbooks" && !$request->session()->has('admin')){
            return redirect("/books");
        }
        if($request->path()=="bbooks" && !$request->session()->has('admin')){
            return redirect("/books");
        }
        if($request->path()=="bookrequests" && !$request->session()->has('admin')){
            return redirect("/books");
        }
        if($request->path()=="fail" && !$request->session()->has('student')){
            return redirect("/books");
        }
        if($request->path()=="mybooks" && !$request->session()->has('student')){
            return redirect("/books");
        }
        if($request->path()=="profle" && !$request->session()->has('student')){
            return redirect("/books");
        }
        if($request->path()=="students" && !$request->session()->has('admin')){
            return redirect("/books");
        }
        return $next($request);
    }
}
