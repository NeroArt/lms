<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->roles_id==1 && Auth::user()->status==1){
            return $next($request);
        }

        if(Auth::check() && Auth::user()->roles_id==1 && Auth::user()->status==0){
            Auth::logout();
            return redirect('/')->with('alert','Ingreso como ADMINISTRADOR, pero la cuenta esta bloqueada, por favor contacte con el ADMINISTRADOR DE SISTEMA.');
        }

        if(Auth::check() && Auth::user()->roles_id==2 && Auth::user()->status==1){
            return redirect('/home')->with('Esta conectado como CLIENTE.');
        }

        if(Auth::check() && Auth::user()->roles_id==2 && Auth::user()->status==0){
            Auth::logout();
            return redirect('/')->with('alert','La cuenta ha sido bloqueada, por favor contacte con el ADMINISTRADOR.');
        }

        if(Auth::check() && Auth::user()->roles_id==3 && Auth::user()->status==1){
            return redirect('/superadministrador')->with('Esta conectado como SUPER ADMINISTRADOR.');
        }

        if(Auth::check() && Auth::user()->roles_id==3 && Auth::user()->status==0){
            Auth::logout();
            return redirect('/')->with('alert','Ingreso como SUPER ADMINISTRADOR, pero la cuenta esta bloqueada, por favor contacte con soporte técnico.');
        }


    }
}
