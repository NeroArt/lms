<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\evaluacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion5Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }

    public function show($cursoId)
    {
        $evaluaciones=DB::table('evaluaciones')
        ->join('cursos','cursos.id', '=','evaluaciones.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->select('evaluaciones.*')
        ->simplePaginate(30);
        return view('cliente.seccion5.showseccion5',['cursoId' => $cursoId])->with('evaluaciones',$evaluaciones);
    }
    
    public function index()
    {
        $evaluaciones=DB::table('evaluaciones')
        ->join('cursos','cursos.id', '=','evaluaciones.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
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
        $data = json_decode($request->getContent(), true);
        // Acceder al array de guests
                evaluacione::insert($data); 

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
