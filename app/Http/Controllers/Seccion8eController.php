<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\desarrollo_curso;
use App\Models\desarrollo_cursos_actividade;
use App\Models\actividades_avance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion8eController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
   

    public function index()
    {
        $desarrollo_cursos=DB::table('desarrollo_cursos')
        ->join('cursos','cursos.id', '=','desarrollo_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('seccion_encuadre', 5)
        ->select('desarrollo_cursos.*')
        ->simplePaginate(30);
        
        $desarrollo_actividades=DB::table('desarrollo_cursos_actividades')
        ->join('desarrollo_cursos','desarrollo_cursos.id', '=','desarrollo_cursos_actividades.desarrollo_cursos_id')
        ->join('cursos','cursos.id', '=','desarrollo_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('desarrollo_cursos_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion8e.indexseccion8e')->with('desarrollo_actividades',$desarrollo_actividades)
        ->with('desarrollo_cursos',$desarrollo_cursos);
    }

    public function create()
    {
        return view('cliente.seccion8e.createseccion8e');
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
            ->where('seccion_encuadre', 5)
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
                ->where('seccion_encuadre', 5)
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

    public function show($cursoId)
    {
        $desarrollo_cursos=DB::table('desarrollo_cursos')
        ->join('cursos','cursos.id', '=','desarrollo_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->where('seccion_encuadre', 5)
        ->select('desarrollo_cursos.*')
        ->simplePaginate(30);
        
        $desarrollo_actividades=DB::table('desarrollo_cursos_actividades')
        ->join('desarrollo_cursos','desarrollo_cursos.id', '=','desarrollo_cursos_actividades.desarrollo_cursos_id')
        ->join('cursos','cursos.id', '=','desarrollo_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->where('seccion_encuadre', 5)
        ->select('desarrollo_cursos_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion8e.showseccion8e',['cursoId' => $cursoId]
        )->with('desarrollo_actividades',$desarrollo_actividades)
        ->with('desarrollo_cursos',$desarrollo_cursos);
    }

    public function getSubtemas($CursoId)
    {
        //Creamos array donde se guardaran los temas y subtemas
        $arrayTemario = [];
        // Obtenemos el JSON y lo asignamos a la variable $datos 
        $CursoId = intval($CursoId);

        $Temas = DB::table('temarios')
        ->join('objetivos','objetivos.id', '=','temarios.objetivos_id')
        ->join('cursos','cursos.id', '=','objetivos.cursos_id')
        ->where('cursos.id', '=', $CursoId)
        ->select('temarios.*')
        ->orderBy('id', 'asc')
        ->first();

        $Subtemas = DB::table('subtemas')
        ->where('subtemas.temarios_id', '=', $Temas->id)
        ->select('subtemas.*')
        ->orderBy('id', 'desc')
        ->get();
        foreach ($Subtemas as $subtema) {
            array_push($arrayTemario, $subtema->subtema);
        }
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $arrayTemario,
        ], 200);
    }

    public function edit($id)
    {
        $desarrollo_curso = desarrollo_curso::findOrFail($id);
        $curso_id = $desarrollo_curso->cursos_id; // Accede al id del curso
        return view('cliente.seccion8e.editseccion8e',compact('desarrollo_curso', 'curso_id'));
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
        ->where('desarrollo_cursos.seccion_encuadre', '=', 5)
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
        $desarrollo_actividad = desarrollo_cursos_actividade::findOrFail($id);
        $desarrollo_curso = desarrollo_curso::findOrFail($desarrollo_actividad->desarrollo_cursos_id); // Accede al desarrollo_curso asociado
        $curso_id = $desarrollo_curso->cursos_id; // Accede al id del curso
        return view('cliente.seccion8e.actividad',compact('desarrollo_actividad', 'curso_id'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            desarrollo_cursos_actividade::where('id', '=', $id)->update($datosActividad);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

    public function seguimiento8e($nombreVista, $CursoId)
    {
    // Obtenemos el JSON y lo asignamos a la variable $datos
    $nombreVista = strval($nombreVista);
    $CursoId = intval($CursoId);

    // Realiza la consulta a la tabla actividades_avances
    $actividad = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
        ->where('actividades_avances.seccion', '=', $nombreVista)
        ->first();

    // Inicializa la variable alcanzado en false
    $alcanzado = false;

    // Si la actividad existe y su porcentaje_seccion es 100, entonces alcanzado es true
    if ($actividad && $actividad->porcentaje_seccion == 100) {
        $alcanzado = true;
    }

        return response()->json([
            'success' => true,
            'message' => 'Los temas se consultaron correctamente',
            'data' => $nombreVista,
            'alcanzado' => $alcanzado,

        ], 200);
    }


}
