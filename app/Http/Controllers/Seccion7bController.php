<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\curso;
use App\Models\inicio_curso;
use App\Models\inicio_actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;


class Seccion7bController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }

    public function show($cursoId)
    {
        $inicio_cursos=DB::table('inicio_cursos')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->join('inicio_actividades','inicio_actividades.inicio_cursos_id', '=','inicio_cursos.id')
        ->where('seccion_encuadre', 2)
        ->select('inicio_cursos.*','inicio_actividades.material_equipo_apoyo as material')
        ->simplePaginate(30);
        
        $inicio_actividades=DB::table('inicio_actividades')
        ->join('inicio_cursos','inicio_cursos.id', '=','inicio_actividades.inicio_cursos_id')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->where('seccion_encuadre', 2)
        ->select('inicio_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion7b.showseccion7b',['cursoId' => $cursoId])->with('inicio_actividades',$inicio_actividades)
        ->with('inicio_cursos',$inicio_cursos);
    }
    
    public function index()
    {
        $inicio_cursos=DB::table('inicio_cursos')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->join('inicio_actividades','inicio_actividades.inicio_cursos_id', '=','inicio_cursos.id')
        ->where('seccion_encuadre', 2)
        ->select('inicio_cursos.*','inicio_actividades.material_equipo_apoyo as material')
        ->simplePaginate(30);
        
        $inicio_actividades=DB::table('inicio_actividades')
        ->join('inicio_cursos','inicio_cursos.id', '=','inicio_actividades.inicio_cursos_id')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('inicio_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion7b.indexseccion7b')->with('inicio_actividades',$inicio_actividades)
        ->with('inicio_cursos',$inicio_cursos);
    }

    public function create()
    {
        return view('cliente.seccion7b.createseccion7b');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $Evaluaciones  = $data['evaluaciones'];
        $Actividades  = $data['actividades'];

        if(empty($Actividades)) {
            if(empty($Evaluaciones)){
                $guardarEtapaInicio = $request->only(['etapa_encuadre','cursos_id','seccion_encuadre']);
                $ClaveActividad = $request->only(['momento_aplicacion']);
                $GuardarActividad = $request->only(['duracion','tecnicas','material_equipo_apoyo']);
        
                // Guardar en la tabla inicio_cursos
                inicio_curso::insert($guardarEtapaInicio);
        
                $Curso_Id = $request->only(['cursos_id']);
                $Inicio_Id = DB::table('inicio_cursos')
                ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
                ->where('cursos_id', $Curso_Id['cursos_id'])
                ->where('seccion_encuadre', 2)
                ->select('inicio_cursos.id')
                ->orderBy('id', 'desc')
                ->first();

        
                $GuardarActividad["actividad"] =  $ClaveActividad['momento_aplicacion'];
                $GuardarActividad["inicio_cursos_id"] =  $Inicio_Id->id;
        
                // Insertar los datos en la tabla Objetivo
                inicio_actividade::insert($GuardarActividad);   
            }else{
                $guardarEtapaInicio = $request->only(['etapa_encuadre','cursos_id','seccion_encuadre']);
                // Guardar en la tabla inicio_cursos
                inicio_curso::insert($guardarEtapaInicio);
                $Curso_Id = $request->only(['cursos_id']);
                $Inicio_Id = DB::table('inicio_cursos')
                    ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
                    ->where('cursos_id', $Curso_Id['cursos_id'])
                    ->where('seccion_encuadre', 2)
                    ->select('inicio_cursos.id')
                    ->first();
                
                //Guardar datos en tabla actividades
                $Evaluaciones  = $data['evaluaciones'];
                $duracion = $data['duracion'];
                $tecnicas = $data['tecnicas'];
                $material_equipo_apoyo = $data['material_equipo_apoyo'];
                $arrayVacio = [];
                // Puedes iterar sobre el array de guests y acceder a cada objeto
                foreach ($Evaluaciones  as $evaluacion) {
                    $nuevoElemento = [
                        'actividad' => $evaluacion['evaluacion'],
                        // Añade aquí los datos adicionales que quieras
                        'duracion' => $duracion,
                        'tecnicas' => $tecnicas,
                        'material_equipo_apoyo' => $material_equipo_apoyo,
                        'inicio_cursos_id' => $Inicio_Id->id
                    ];
                    $arrayVacio[] = $nuevoElemento; 
                }  
        
                // Insertar los datos en la tabla
                foreach ($arrayVacio as $elemento) {
                    inicio_actividade::insert($elemento);
                }

            }
            

        } else {
            $Curso_Id = $request->only(['cursos_id']);
            $guardarEtapaInicio = $request->only(['etapa_encuadre','cursos_id','seccion_encuadre']);
            // Guardar en la tabla inicio_cursos
            inicio_curso::insert($guardarEtapaInicio);
            $Inicio_Id = DB::table('inicio_cursos')
                ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
                ->where('cursos_id', $Curso_Id['cursos_id'])
                ->where('seccion_encuadre', 2)
                ->select('inicio_cursos.id')
                ->first();
            
            //Guardar datos en tabla actividades
            $Actividades  = $data['actividades'];
            $duracion = $data['duracion'];
            $tecnicas = $data['tecnicas'];
            $material_equipo_apoyo = $data['material_equipo_apoyo'];
            $arrayVacio = [];
            // Puedes iterar sobre el array de guests y acceder a cada objeto
            foreach ($Actividades  as $actividad) {
                $nuevoElemento = [
                    'actividad' => $actividad['actividad'],
                    // Añade aquí los datos adicionales que quieras
                    'duracion' => $duracion,
                    'tecnicas' => $tecnicas,
                    'material_equipo_apoyo' => $material_equipo_apoyo,
                    'inicio_cursos_id' => $Inicio_Id->id
                ];
                $arrayVacio[] = $nuevoElemento; 
            }  
    
            // Insertar los datos en la tabla
            foreach ($arrayVacio as $elemento) {
                inicio_actividade::insert($elemento);
            }
        }
       
        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($data),
            'data' => $data
        ], 200);

    }

    public function getParticulares($CursoId)
    {
        // Obtenemos el JSON y lo asignamos a la variable $datos
        $CursoId = intval($CursoId);

        $Temas = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $CursoId)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.descripcion')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $Temas,

        ], 200);
    }

    public function getGeneral($CursoId)
    {
        // Obtenemos el JSON y lo asignamos a la variable $datos
        $CursoId = intval($CursoId);

        $Temas = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $CursoId)
        ->where('objetivos.tipo_objetivo', '=', 'general')
        ->select('objetivos.descripcion')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $Temas,

        ], 200);
    }

   
    public function getTemario($CursoId)
    {
        //Creamos array donde se guardaran los temas y subtemas
        $arrayTemario = [];
        // Obtenemos el JSON y lo asignamos a la variable $datos 
        $CursoId = intval($CursoId);

        $Temas = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->join('temarios','temarios.objetivos_id', '=','objetivos.id')
        ->where('cursos.id', '=', $CursoId)
        ->select('temarios.*')
        ->get();


        foreach ($Temas as $tema) {
            array_push($arrayTemario, $tema->tema);
            $Subtemas = DB::table('subtemas')
            ->where('subtemas.temarios_id', '=', $tema->id)
            ->select('subtemas.*')
            ->get();
            foreach ($Subtemas as $subtema) {
                array_push($arrayTemario, $subtema->subtema);
            }
        }

        
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $arrayTemario,
        ], 200);
    }

    public function getBeneficios($CursoId)
    {
        //Creamos array donde se guardaran los temas y subtemas
        $arrayBeneficios = [];
        // Obtenemos el JSON y lo asignamos a la variable $datos 
        $CursoId = intval($CursoId);

        $BeneficiosCurso = DB::table('cursos')
        ->where('cursos.id', '=', $CursoId)
        ->select('cursos.beneficios_del_curso')
        ->get();

        $Beneficios = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->join('beneficios','beneficios.objetivos_id', '=','objetivos.id')
        ->where('cursos.id', '=', $CursoId)
        ->select('beneficios.*')
        ->get();

        //array_push($arrayBeneficios, $BeneficiosCurso->beneficios_del_curso);
        foreach ($BeneficiosCurso as $beneficio) {
            array_push($arrayBeneficios, $beneficio->beneficios_del_curso);
        }
        foreach ($Beneficios as $beneficio) {
            array_push($arrayBeneficios, $beneficio->beneficio);
        }

        
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $arrayBeneficios,
        ], 200);
    }

    public function getEvaluaciones($CursoId)
    {
        // Obtenemos el JSON y lo asignamos a la variable $datos
        $CursoId = intval($CursoId);

        $Evaluaciones = DB::table('cursos')
        ->join('evaluaciones','evaluaciones.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $CursoId)
        ->select('evaluaciones.*')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $Evaluaciones,

        ], 200);
    }

    public function getDescripcionCurso($CursoId)
    {
        // Obtenemos el JSON y lo asignamos a la variable $datos
        $CursoId = intval($CursoId);

        $Cursos = DB::table('cursos')
        ->where('cursos.id', '=', $CursoId)
        ->select('cursos.*')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $Cursos,
        ], 200);
    }

    public function edit($id)
    {
        $inicio_curso=inicio_curso::findOrFail($id);
        return view('cliente.seccion7b.editseccion7b',compact('inicio_curso'));
    }

    public function update(Request $request, $id)
    { 
        $datosApertura=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            inicio_curso::where('id', '=', $id)->update($datosApertura);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

    public function editactividad($id)
    {
        $inicio_actividade=inicio_actividade::findOrFail($id);
        return view('cliente.seccion7b.actividad',compact('inicio_actividade'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
        $inicio_cursos_id=request()->only(['inicio_cursos_id']);
        $material_equipo_apoyo = $datosActividad['material_equipo_apoyo'];

        $actividades_Id = DB::table('inicio_actividades')
        ->where('inicio_actividades.inicio_cursos_id', '=', $inicio_cursos_id)
        ->select('inicio_actividades.id')
        ->get();

        foreach ($actividades_Id as $actividad) {
            DB::table('inicio_actividades')
                ->where('id', $actividad->id)
                ->update(['material_equipo_apoyo' => $material_equipo_apoyo]);
        }

        if (Auth::user()->roles_id==2) {
            inicio_actividade::where('id', '=', $id)->update($datosActividad);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }

        
    }

}
