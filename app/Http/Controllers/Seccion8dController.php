<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\desarrollo_curso;
use App\Models\desarrollo_cursos_actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;


class Seccion8dController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $desarrollo_cursos=DB::table('desarrollo_cursos')
        ->where('seccion_encuadre', 4)
        ->select('desarrollo_cursos.*')
        ->simplePaginate(30);
        
        $desarrollo_actividades=DB::table('desarrollo_cursos_actividades')
        ->select('desarrollo_cursos_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion8d.indexseccion8d')->with('desarrollo_actividades',$desarrollo_actividades)
        ->with('desarrollo_cursos',$desarrollo_cursos);
    }

    public function create()
    {
        return view('cliente.seccion8d.createseccion8d');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $Actividades  = $data['actividades'];

        if(empty($Actividades)) {
            $Curso_Id = $request->only(['cursos_id']);
            
            $guardarEtapaDesarrollo = $request->only(['duracion','tecnicas','material_equipo_apoyo','seccion_encuadre','cursos_id','etapa_encuadre']);
            // Guardar en la tabla desarrollo_cursos
            desarrollo_curso::insert($guardarEtapaDesarrollo);
            $Inicio_Id = DB::table('desarrollo_cursos')
            ->join('cursos', 'desarrollo_cursos.cursos_id', '=', 'cursos.id')
            ->where('cursos_id', $Curso_Id['cursos_id'])
            ->where('seccion_encuadre', 4)
            ->select('desarrollo_cursos.id')
            ->orderBy('id', 'desc')
            ->first();

          
            //Guardar actividad
            $GuardarElemento = [
                'actividad' => $data['actividad'],
                'desarrollo_cursos_id' => $Inicio_Id->id
            ];
            
            desarrollo_cursos_actividade::insert($GuardarElemento);


        }else{
            $Curso_Id = $request->only(['cursos_id']);
            
            $guardarEtapaDesarrollo = $request->only(['duracion','tecnicas','material_equipo_apoyo','seccion_encuadre','cursos_id','etapa_encuadre']);
            // Guardar en la tabla desarrollo_cursos
            desarrollo_curso::insert($guardarEtapaDesarrollo);
    
            $Inicio_Id = DB::table('desarrollo_cursos')
                ->join('cursos', 'desarrollo_cursos.cursos_id', '=', 'cursos.id')
                ->where('cursos_id', $Curso_Id['cursos_id'])
                ->where('seccion_encuadre', 4)
                ->select('desarrollo_cursos.id')
                ->orderBy('id', 'desc')
                ->first();
            
            //Guardar datos en tabla actividades
            $Actividades  = $data['actividades'];
            $arrayVacio = [];
            //Guardar actividad
            $nuevoElemento = [
                'actividad' => $data['actividad'],
                'desarrollo_cursos_id' => $Inicio_Id->id
            ];
            $arrayVacio[] = $nuevoElemento; 
            // Puedes iterar sobre el array de guests y acceder a cada objeto
            foreach ($Actividades  as $actividad) {
                $nuevoElemento = [
                    'actividad' => $actividad['actividad'],
                    'desarrollo_cursos_id' => $Inicio_Id->id
                ];
                $arrayVacio[] = $nuevoElemento; 
            }  
            // Insertar los datos en la tabla
            foreach ($arrayVacio as $elemento) {
                desarrollo_cursos_actividade::insert($elemento);
            }


        }

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
        $desarrollo_curso=desarrollo_curso::findOrFail($id);
        return view('cliente.seccion8d.editseccion8d',compact('desarrollo_curso'));
    }

    public function update(Request $request, $id)
    { 
        $datos=request()->except(['_token','_method']);
        $cursos_id=request()->only(['cursos_id']);
        $etapa_encuadre = $datos['etapa_encuadre'];
        $duracion = $datos['duracion'];
        $tecnicas = $datos['tecnicas'];
        $material_equipo_apoyo = $datos['material_equipo_apoyo'];

        $desarrollo_Id = DB::table('desarrollo_cursos')
        ->where('desarrollo_cursos.cursos_id', '=', $cursos_id)
        ->where('desarrollo_cursos.seccion_encuadre', '=', 4)
        ->select('desarrollo_cursos.id')
        ->get();

        foreach ($desarrollo_Id as $desarrollo) {
            DB::table('desarrollo_cursos')
                ->where('id', $desarrollo->id)
                ->update(['etapa_encuadre' => $etapa_encuadre,'duracion' => $duracion,'tecnicas' => $tecnicas,'material_equipo_apoyo' => $material_equipo_apoyo]);
        }

        if (Auth::user()->roles_id==2) {
            desarrollo_curso::where('id', '=', $id)->update($datos);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

    public function editactividad($id)
    {
        $desarrollo_actividad=desarrollo_cursos_actividade::findOrFail($id);
        return view('cliente.seccion8d.actividad',compact('desarrollo_actividad'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            desarrollo_cursos_actividade::where('id', '=', $id)->update($datosActividad);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }


}
