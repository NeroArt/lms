<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class UsuariosAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=DB::table('users')
        ->select('users.*')
        ->where('users.roles_id', '=', 2)
        ->simplePaginate(30);

        return view('administrador.formusuarios.indexformusuarios')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $usuario=User::findOrFail($id);
        return view('administrador.formusuarios.editformusuarios',compact('usuario'));
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
            $roles_id = $a->roles_id    ;
        }

        //Compara los id del usuario, si son iguales, no se actualizaran los datos
        if (Auth::user()->id==$id) {
            return redirect('formusuarioadmin')->with('Mensaje','No se puede modificar su propio perfil aquí, acceda a opciones de perfil');
        }
        
        //Compara si el usuario es administrador y que no pueda modificar a otros administradores
        if (Auth::user()->roles_id==1 && $roles_id==1) {
            return redirect('formusuarioadmin')->with('Mensaje','No se puede modificar otros Administradores');
        }

        //Compara si el usuario es administrador y que no pueda modificar a los super administradores
        if (Auth::user()->roles_id==1 && $roles_id==3) {
            return redirect('formusuarioadmin')->with('Mensaje','No se puede modificar otros Super Administradores');
        }

        //Compara si es administrador y que pueda modificar a cualquiera que tenga rol cliente
        if (Auth::user()->roles_id==1 && $roles_id==2 && $request->cambiarpassword==false) {
            $datosUsuario=[
                'name'=>$request->name,
                'email'=>$request->email,
                'curp'=>$request->curp,
                'telefono_celular'=>$request->telefono_celular,
                'status'=>$request->status,
                
            ];
            
            User::where('id', '=', $id)->update($datosUsuario);
            return redirect('formusuarioadmin')->with('Mensaje','Usuario modificado con éxito');
        }

                //Compara si es administrador, que pueda modificar a cualquiera que tenga rol cliente y se active cambiarpassword
                if (Auth::user()->roles_id==1 && $roles_id==2 && $request->cambiarpassword==true) {
                    $datosUsuario=[
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'curp'=>$request->curp,
                        'telefono_celular'=>$request->telefono_celular,
                        'status'=>$request->status,
                        'password'=>Hash::make($request->password),
                        
                    ];
                    
                    User::where('id', '=', $id)->update($datosUsuario);
                    return redirect('formusuarioadmin')->with('Mensaje','Usuario modificado con éxito');
                }


        if (Auth::user()->roles_id==1 && $roles_id!=2 ) {
            return redirect('formusuarioadmin')->with('Mensaje','Solo puede modificar Clientes');
        }
       
    }

}
