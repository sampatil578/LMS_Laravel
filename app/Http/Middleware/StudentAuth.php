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
        if($request->path()=="student_login" && $request->session()->has('student')){
            return redirect("/");
        }
        if($request->path()=="student_signup" && $request->session()->has('student')){
            return redirect("/");
        }
        return $next($request);
    }
}
