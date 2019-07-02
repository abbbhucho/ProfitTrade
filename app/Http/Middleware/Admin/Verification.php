<?php

namespace App\Http\Middleware\Admin;
use Admin;
use Closure;

class Verification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $isAdmin = Admin::first()->id;
        echo $isAdmin;
        if(auth::user() && auth::user()->admin == $isadmin){
        return $next($request);
        }
        return redirect('');
        // return redirect('user/{id}');
    }
}
