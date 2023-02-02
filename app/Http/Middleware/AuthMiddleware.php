<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $attempted = false;
        if($request->get('email') && $request->get('password')) {
            Auth::attempt($request->only('email', 'password'));
            $attempted = true;
        }
        $user = Auth::user();
        
        if(!$user){
            if($attempted) {
                return redirect('/login')->with('error', 'Email ou mot de passe erroné ');
            } else {
                return redirect('/login')->with('error', 'Veuillez vous connecter');
            }
        }
        
        return $next($request);
    }
}
