<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\curso;
use App\Models\inicio_curso;
use App\Models\inicio_actividade;
use App\Models\actividades_avance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion7cController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }

   

    
    public function index()
    {
        $inicio_cursos=DB::table('inicio_cursos')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('seccion_encuadre', 3)
        ->select('inicio_cursos.*')
        ->simplePaginate(30);
        
        $inicio_actividades=DB::table('inicio_actividades')
        ->join('inicio_cursos','inicio_cursos.id', '=','inicio_actividades.inicio_cursos_id')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('inicio_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion7c.indexseccion7c')->with('inicio_actividades',$inicio_actividades)
        ->with('inicio_cursos',$inicio_cursos);
    }

    public function create()
    {
        return view('cliente.seccion7c.createseccion7c');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $Descripciones  = $data['descripciones'];
        $Actividades  = $data['actividades'];

        if(empty($Actividades)) {
            if(empty($Descripciones)){
                $guardarEtapaInicio = $request->only(['etapa_encuadre','cursos_id','seccion_encuadre']);
                $ClaveActividad = $request->only(['momento_aplicacion']);
                $GuardarActividad = $request->only(['duracion','tecnicas','material_equipo_apoyo']);
        
                // Guardar en la tabla inicio_cursos
                inicio_curso::insert($guardarEtapaInicio);
        
                $Curso_Id = $request->only(['cursos_id']);
                $Inicio_Id = DB::table('inicio_cursos')
                ->join ('cursos','cursos.id', '=','inicio_cursos.cursos_id')
                ->where('cursos_id', $Curso_Id['cursos_id'])
                ->where('seccion_encuadre', 3)
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
                    ->where('seccion_encuadre', 3)
                    ->select('inicio_cursos.id')
                    ->orderBy('id', 'desc')
                    ->first();
                
                //Guardar datos en tabla actividades
                $Descripciones  = $data['descripciones'];
                $duracion = $data['duracion'];
                $tecnicas = $data['tecnicas'];
                $material_equipo_apoyo = $data['material_equipo_apoyo'];
                $arrayVacio = [];
                // Puedes iterar sobre el array de guests y acceder a cada objeto
                foreach ($Descripciones  as $descripcion) {
                    $nuevoElemento = [
                        'actividad' => $descripcion['descripcion'],
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
                ->where('seccion_encuadre', 3)
                ->select('inicio_cursos.id')
                ->orderBy('id', 'desc')
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

    public function show($cursoId)
    {
        $inicio_cursos=DB::table('inicio_cursos')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->where('seccion_encuadre', 3)
        ->select('inicio_cursos.*')
        ->simplePaginate(30);
        
        $inicio_actividades=DB::table('inicio_actividades')
        ->join('inicio_cursos','inicio_cursos.id', '=','inicio_actividades.inicio_cursos_id')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->where('seccion_encuadre', 3)
        ->select('inicio_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion7c.showseccion7c',['cursoId' => $cursoId])->with('inicio_actividades',$inicio_actividades)
        ->with('inicio_cursos',$inicio_cursos);
    }

    public function edit($id)
    {
        $inicio_curso=inicio_curso::findOrFail($id);
        $curso_id = $inicio_curso->cursos_id; 
        return view('cliente.seccion7c.editseccion7c',compact('inicio_curso', 'curso_id'));
    }

    public function update(Request $request, $id)
    { 
        $datos=request()->except(['_token','_method']);
        $cursos_id=request()->only(['cursos_id']);
        $etapa_encuadre = $datos['etapa_encuadre'];

        $inicio_Id = DB::table('inicio_cursos')
        ->where('inicio_cursos.cursos_id', '=', $cursos_id)
        ->where('inicio_cursos.seccion_encuadre', '=', 3)
        ->select('inicio_cursos.id')
        ->get();

        foreach ($inicio_Id as $inicio) {
            DB::table('inicio_cursos')
                ->where('id', $inicio->id)
                ->update(['etapa_encuadre' => $etapa_encuadre]);
        }

        if (Auth::user()->roles_id==2) {
            inicio_curso::where('id', '=', $id)->update($datos);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }

    }

    public function editactividad($id)
    {

        $inicio_actividade = inicio_actividade::findOrFail($id);
        $inicio_curso = inicio_curso::findOrFail($inicio_actividade->inicio_cursos_id); // Accede al previo_inicio asociado
        $curso_id = $inicio_curso->cursos_id; // Accede al id del curso

        return view('cliente.seccion7c.actividad',compact('inicio_actividade', 'curso_id'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
        $inicio_cursos_id=request()->only(['inicio_cursos_id']);
        $duracion = $datosActividad['duracion'];
        $tecnicas = $datosActividad['tecnicas'];
        $material_equipo_apoyo = $datosActividad['material_equipo_apoyo'];

        $actividades_Id = DB::table('inicio_actividades')
        ->where('inicio_actividades.inicio_cursos_id', '=', $inicio_cursos_id)
        ->select('inicio_actividades.id')
        ->get();

        foreach ($actividades_Id as $actividad) {
            DB::table('inicio_actividades')
                ->where('id', $actividad->id)
                ->update(['duracion' => $duracion, 'tecnicas' => $tecnicas,'material_equipo_apoyo' => $material_equipo_apoyo]);
        }

        if (Auth::user()->roles_id==2) {
            inicio_actividade::where('id', '=', $id)->update($datosActividad);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

    public function seguimiento7c($nombreVista, $CursoId)
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
