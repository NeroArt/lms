<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\cierre_curso;
use App\Models\cierre_cursos_actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion9bController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $cierre_cursos=DB::table('cierre_cursos')
        ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('seccion_encuadre', 2)
        ->select('cierre_cursos.*')
        ->simplePaginate(30);
        
        $cierre_actividades=DB::table('cierre_cursos_actividades')
        ->select('cierre_cursos_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion9b.indexseccion9b')->with('cierre_actividades',$cierre_actividades)
        ->with('cierre_cursos',$cierre_cursos);
    }

    public function create()
    {
        return view('cliente.seccion9b.createseccion9b');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $guardarEtapa = $request->only(['duracion','tecnicas','material_equipo_apoyo','seccion_encuadre','cursos_id','etapa_encuadre']);
        // Guardar en la tabla cierre_cursos
        cierre_curso::insert($guardarEtapa);

        $Curso_Id = $request->only(['cursos_id']);
        $cierre_Id = DB::table('cierre_cursos')
            ->join('cursos', 'cierre_cursos.cursos_id', '=', 'cursos.id')
            ->where('cursos_id', $Curso_Id['cursos_id'])
            ->where('seccion_encuadre', 2)
            ->select('cierre_cursos.id')
            ->orderBy('id', 'desc')
            ->first();

            $Actividad  = $data['actividad'];
            $nuevoElemento = [
                'actividad' => $Actividad,
                'cierre_cursos_id' => $cierre_Id->id
            ];

            cierre_cursos_actividade::insert($nuevoElemento);

        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($nuevoElemento),
            'data' => $nuevoElemento
        ], 200);
    }

    public function edit($id)
    {
        $cierre_curso=cierre_curso::findOrFail($id);
        return view('cliente.seccion9b.editseccion9b',compact('cierre_curso'));
    }

    public function update(Request $request, $id)
    { 
        $datos=request()->except(['_token','_method']);
        $cursos_id=request()->only(['cursos_id']);
        $etapa_encuadre = $datos['etapa_encuadre'];
        $duracion = $datos['duracion'];
        $tecnicas = $datos['tecnicas'];
        $material_equipo_apoyo = $datos['material_equipo_apoyo'];

        $desarrollo_Id = DB::table('cierre_cursos')
        ->where('cierre_cursos.cursos_id', '=', $cursos_id)
        ->where('cierre_cursos.seccion_encuadre', '=', 2)
        ->select('cierre_cursos.id')
        ->get();

        foreach ($desarrollo_Id as $desarrollo) {
            DB::table('cierre_cursos')
                ->where('id', $desarrollo->id)
                ->update(['etapa_encuadre' => $etapa_encuadre,'duracion' => $duracion,'tecnicas' => $tecnicas,'material_equipo_apoyo' => $material_equipo_apoyo]);
        }

        if (Auth::user()->roles_id==2) {
            cierre_curso::where('id', '=', $id)->update($datos);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }

    }

    public function editactividad($id)
    {
        $cierre_actividad=cierre_cursos_actividade::findOrFail($id);
        return view('cliente.seccion9b.actividad',compact('cierre_actividad'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            cierre_cursos_actividade::where('id', '=', $id)->update($datosActividad);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }
}
