<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\actividades_avance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class ActividadesAvanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    
    public function index()
    {
        $actividades=DB::table('actividades_avances')
        ->select('actividades_avances.*')
        ->simplePaginate(30);
        return view('superadministrador.actividades.indexactividades')->with('actividades',$actividades);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadministrador.actividades.createactividades');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosActividad=request()->except(['_token','_method']);
        actividades_avance::insert($datosActividad);
        return redirect('/actividades')->with('Mensaje','Actividad agregada con éxito');



    }


    public function edit($id)
    {
        $actividad=actividades_avance::findOrFail($id);
        return view('superadministrador.actividades.editactividades',compact('actividad'));
    }


    public function update(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==3) {
            actividades_avance::where('id', '=', $id)->update($datosActividad);
            return redirect('actividades')->with('Mensaje','Actividad modificada con éxito');
        }
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
