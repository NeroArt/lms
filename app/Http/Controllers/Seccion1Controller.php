<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Seccion1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        return view('cliente.seccion1');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formusuarios.createformusuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }


    public function edit($id)
    {
        $usuario=User::findOrFail($id);
        return view('formusuarios.editformusuario',compact('usuario'));
    }


    public function update(Request $request, $id)
    { 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
