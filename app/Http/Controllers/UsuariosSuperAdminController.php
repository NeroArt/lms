<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class UsuariosSuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index()
    {
        $usuarios=DB::table('users')
        ->join('roles','users.roles_id', '=','roles.id')
        ->select('users.*','roles.descripcion')
        ->simplePaginate(30);

        return view('superadministrador.usuariossuperadmin.indexusuariossuperadmin')->with('usuarios',$usuarios);
    }

    public function create()
    {
        return view('superadministrador.usuariossuperadmin.createusuariossuperadmin');
    }

    public function store(Request $request)
    {

        //Datos que se guardan en Usuarios
        $datosActividad=request()->except(['_token','_method']);
        
        if (Auth::user()->roles_id==3) {
            $datosUsuario=[
                'name'=>$request->name,
                'email'=>$request->email,
                'curp'=>$request->curp,
                'telefono_celular'=>$request->telefono_celular,
                'status'=>$request->status,
                'password'=>Hash::make($request->password),
                'roles_id'=>$request->roles_id,
                
            ];
            
            User::insert($datosUsuario);
            return redirect('usuariossuperadmin')->with('Mensaje','Usuario creado con éxito');
        }

    }


    public function edit($id)
    {
        $usuario=User::findOrFail($id);
        return view('superadministrador.usuariossuperadmin.editusuariossuperadmin',compact('usuario'));
    }

    public function update(Request $request, $id)
    { 
        $datosUsuario=request()->except(['_token','_method']);
        //Obtener el id del usuario por medio de su correo
        $nombrecorreo=$request->get('email');

        $usuarios =DB::table('users')
        ->where('users.email', '=', $nombrecorreo)
        ->get(array('roles_id'));
        $roles_id = '';

        foreach ($usuarios as $a) {
            $roles_id = $a->roles_id;
        }

        //Compara los id del usuario, si son iguales, no se actualizaran los datos
        if (Auth::user()->id==$id) {
            return redirect('usuariossuperadmin')->with('Mensaje','No se puede modificar su propio perfil aquí, acceda a opciones de perfil');
        }
        
        //Compara si el usuario es super administrador y que no pueda modificar a otros super administradores
        if (Auth::user()->roles_id==3 && $roles_id==3) {
            return redirect('usuariossuperadmin')->with('Mensaje','No se puede modificar otros Super Administradores');
        }

        //Compara si es super administrador y que pueda modificar a cualquiera que tenga rol cliente
        if (Auth::user()->roles_id==3 && $roles_id==2 && $request->cambiarpassword==false) {
            $datosUsuario=[
                'name'=>$request->name,
                'email'=>$request->email,
                'curp'=>$request->curp,
                'telefono_celular'=>$request->telefono_celular,
                'status'=>$request->status,
                
            ];
            
            User::where('id', '=', $id)->update($datosUsuario);
            return redirect('usuariossuperadmin')->with('Mensaje','Usuario modificado con éxito');
        }

                //Compara si es super administrador, que pueda modificar a cualquiera que tenga rol cliente/administrador y se active cambiarpassword
                if (Auth::user()->roles_id==3 && $roles_id!=3 && $request->cambiarpassword==true) {
                    $datosUsuario=[
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'curp'=>$request->curp,
                        'telefono_celular'=>$request->telefono_celular,
                        'status'=>$request->status,
                        'password'=>Hash::make($request->password),
                        
                    ];
                    
                    User::where('id', '=', $id)->update($datosUsuario);
                    return redirect('usuariossuperadmin')->with('Mensaje','Usuario modificado con éxito');
                }


        if (Auth::user()->roles_id==3 && $roles_id!=3 ) {
            return redirect('usuariossuperadmin')->with('Mensaje','Solo puede modificar Clientes y Administradores');
        }
       
    }



}
