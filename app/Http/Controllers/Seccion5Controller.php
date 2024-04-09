<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\evaluacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use DB;

class Seccion5Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $evaluaciones=DB::table('evaluaciones')
        ->select('evaluaciones.*')
        ->simplePaginate(30);
        return view('cliente.seccion5.indexseccion5')->with('evaluaciones',$evaluaciones);
    }

    public function create()
    {
        return view('cliente.seccion5.createseccion5');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent());
        // Acceder al array de guests

                //$porcentaje=$data['porcentaje'];
                $descripcion=$data->descripcion;
                $aspecto=$data->aspecto;
                $porcentaje=$data->porcentaje;
                $instrumento_evaluacion=$data->instrumento_evaluacion;
                $momento_aplicacion=$data->momento_aplicacion;
                $cursos_id=$data->cursos_id;
                
                DB::table('evaluaciones')->insert([
                    'descripcion' => $descripcion,
                    'aspecto' => $aspecto,
                    'porcentaje' => 10,
                    'momento_aplicacion' => $momento_aplicacion,
                    'instrumento_evaluacion' => $instrumento_evaluacion,
                    'cursos_id' => $cursos_id
                ]);

               
                return response()->json([
                    'success' => true,
                    'message' => 'Los datos se procesaron correctamente',
                    // Si quieres devolver la cantidad de guests, puedes hacerlo así
                    'quantity' => count($data),
                    'data' => $data
                ], 200);
    }

    public function edit($id)
    {
        $evaluacione=evaluacione::findOrFail($id);
        return view('cliente.seccion5.editseccion5',compact('evaluacione'));
    }

    public function update(Request $request, $id)
    { 
        $datosEvaluacion=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            evaluacione::where('id', '=', $id)->update($datosEvaluacion);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }
}
