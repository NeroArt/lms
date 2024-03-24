<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\objetivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use DB;

class Seccion2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    
    public function index()
    {
        $objetivos=DB::table('objetivos')
        ->where('objetivos.tipo_objetivo', '=', "general")
        ->select('objetivos.*')
        ->simplePaginate(30);
        return view('cliente.seccion2.indexseccion2')->with('objetivos',$objetivos);
    }

    public function test()
    {
        return view('cliente.seccion1test');
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.seccion2.createseccion2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Datos que se guardan en Curso
        $datosObjetivo=request()->except(['_token','_method']);
        objetivo::insert($datosObjetivo);
        // Obtenemos el id del curso, y lo enviamos al siguiente create
        $idCurso=$request->cursos_id;
        //var_dump($datosObjetivo);
        //var_dump($idCurso);
        return redirect('seccion3/create')->with('idCurso',$idCurso); 

    }


    public function edit($id)
    {
        $objetivo=objetivo::findOrFail($id);
        return view('cliente.seccion2.editseccion2',compact('objetivo'));
    }


    public function update(Request $request, $id)
    { 
        $datosObjetivo=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            objetivo::where('id', '=', $id)->update($datosObjetivo);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

}
