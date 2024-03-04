<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use DB;


class Cliente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->roles_id==2 && Auth::user()->status==1){
            return $next($request);
        }

        if(Auth::check() && Auth::user()->roles_id==2 && Auth::user()->status==0){
            Auth::logout();
            return redirect('/')->with('alert','Este usuario esta dado de baja, por favor contacte con el ADMINISTRADOR.');
        }

        if(Auth::check() && Auth::user()->roles_id==1 && Auth::user()->status==1){
            return redirect('/paneladministrador')->with('Esta conectado como ADMINISTRADOR.');
        }

        if(Auth::check() && Auth::user()->roles_id==1 && Auth::user()->status==0){
            Auth::logout();
            return redirect('/')->with('alert','Ingreso como ADMINISTRADOR, pero esta dado de baja, por favor contacte con el ADMINISTRADOR DE SISTEMA.');
        }


        
    }
}
