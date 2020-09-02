<?php

namespace App\Http\Middleware;

use Closure;

class authMiddleware
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
        $token = $request->token;

        if ($token=='sania') {
            return $next($request);

        }else{

            echo"<h1>Authentication Filed ! Try Again</h1> ;|";
            // return redirect('/dashboard');
        }

        
    }
}
