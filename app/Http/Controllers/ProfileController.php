<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function show(){
        return view('profile');
    }

    public function store(Request $request){
        //Datos que se guardan en Usuarios
        $datosActividad=request()->except(['_token','_method']);

        $usuario_existente = DB::table('users')
        ->where('email', $request->email)
        ->first();
    

        if(Auth::check() &&  Auth::user()->status==1  && Auth::user()->id==$request->id_user){

            if($request->cambiarpassword==false && $request->cambiaremail==false){
                    
                $datosUsuario=[
                    'name'=>$request->name,
                    'curp'=>$request->curp,
                    'telefono_celular'=>$request->telefono_celular,
                ];
                
                User::where('id', '=', Auth::user()->id)->update($datosUsuario);
                return redirect('profile')->with('Mensaje','Usuario modificado con éxito');
            }
            if($request->cambiarpassword==true && $request->cambiaremail==true){
                    if($usuario_existente){
                        return redirect('profile')->with('Error','El correo ya existe, intente con otro');
                    }
                    if($usuario_existente===Auth::user()->email){
                        return redirect('profile')->with('Error','El correo electronico es el mismo');
                    }
                    
                $datosUsuario=[
                    'name'=>$request->name,
                    'curp'=>$request->curp,
                    'telefono_celular'=>$request->telefono_celular,
                    'password'=>Hash::make($request->password),
                    'email'=>$request->email,
                ];
                
                User::where('id', '=', Auth::user()->id)->update($datosUsuario);
                return redirect('profile')->with('Mensaje','El correo electronico y la contraseña se han modificado con éxito');
            }
            if($request->cambiarpassword==true && $request->cambiaremail==false){
                $datosUsuario=[
                    'name'=>$request->name,
                    'curp'=>$request->curp,
                    'telefono_celular'=>$request->telefono_celular,
                    'password'=>Hash::make($request->password),
                ];
                
                User::where('id', '=', Auth::user()->id)->update($datosUsuario);
                return redirect('profile')->with('Mensaje','Usuario modificado con éxito');
            }
            if($request->cambiarpassword==false && $request->cambiaremail==true){
                
                if($usuario_existente){
                    return redirect('profile')->with('Error','El correo ya existe');
                }
                if($usuario_existente===Auth::user()->email){
                    return redirect('profile')->with('Error','El correo electronico es el mismo');
                }
                $datosUsuario=[
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'curp'=>$request->curp,
                    'telefono_celular'=>$request->telefono_celular,
                    
                ];
                
                User::where('id', '=', Auth::user()->id)->update($datosUsuario);
                return redirect('profile')->with('Mensaje','El correo electronico se ha modificado con Éxito');
            }

        }else{
            Auth::logout();
            return redirect('/');
        }

        return view('profile');
    }
}
