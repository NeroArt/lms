<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\cierre_curso;
use App\Models\cierre_cursos_actividade;
use App\Models\actividades_avance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion9Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->roles_id==1){
                $this->middleware('administrador');
            }
            if(Auth::user()->roles_id==2){
                $this->middleware('cliente');
            }
            if(Auth::user()->roles_id==3){
                $this->middleware('superadmin');
            }
            return $next($request);
        });
    }      

   
    
    public function index()
    {
        $cierre_cursos=DB::table('cierre_cursos')
        ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('seccion_encuadre', 1)
        ->select('cierre_cursos.*')
        ->simplePaginate(30);
        
        $cierre_actividades=DB::table('cierre_cursos_actividades')
        ->join('cierre_cursos','cierre_cursos.id', '=','cierre_cursos_actividades.cierre_cursos_id')
        ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('cierre_cursos_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion9a.indexseccion9a')->with('cierre_actividades',$cierre_actividades)
        ->with('cierre_cursos',$cierre_cursos);
    }

    public function create()
    {
        return view('cliente.seccion9a.createseccion9a');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $Curso_Id = $request->only(['cursos_id']);
            
        $guardarEtapaCierre = $request->only(['duracion','tecnicas','material_equipo_apoyo','seccion_encuadre','cursos_id','etapa_encuadre']);
        // Guardar en la tabla desarrollo_cursos
        cierre_curso::insert($guardarEtapaCierre);

        $Inicio_Id = DB::table('cierre_cursos')
            ->join('cursos', 'cierre_cursos.cursos_id', '=', 'cursos.id')
            ->where('cursos_id', $Curso_Id['cursos_id'])
            ->where('seccion_encuadre', 1)
            ->select('cierre_cursos.id')
            ->orderBy('id', 'desc')
            ->first();
        
        //Guardar datos en tabla actividades_cierre
        $Actividades  = $data['actividades'];
        $arrayVacio = [];
        //Guardar actividad
        $nuevoElemento = [
            'actividad' => $data['actividad'],
            'cierre_cursos_id' => $Inicio_Id->id
        ];
        $arrayVacio[] = $nuevoElemento; 
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($Actividades  as $actividad) {
            $nuevoElemento = [
                'actividad' => $actividad['actividad'],
                'cierre_cursos_id' => $Inicio_Id->id
            ];
            $arrayVacio[] = $nuevoElemento; 
        }  
        // Insertar los datos en la tabla
        foreach ($arrayVacio as $elemento) {
            cierre_cursos_actividade::insert($elemento);
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
        if(Auth::user()->roles_id==2){
            $cierre_cursos=DB::table('cierre_cursos')
            ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
            ->where('cursos.users_id', '=', Auth::user()->id)
            ->where('cursos.id', '=', $cursoId)
            ->where('seccion_encuadre', 1)
            ->select('cierre_cursos.*')
            ->simplePaginate(30);
            
            $cierre_actividades=DB::table('cierre_cursos_actividades')
            ->join('cierre_cursos','cierre_cursos.id', '=','cierre_cursos_actividades.cierre_cursos_id')
            ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
            ->where('cursos.users_id', '=', Auth::user()->id)
            ->where('cursos.id', '=', $cursoId)
            ->where('seccion_encuadre', 1)
            ->select('cierre_cursos_actividades.*')
            ->simplePaginate(30);
        }else{
            $cierre_cursos=DB::table('cierre_cursos')
            ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
            ->where('cursos.id', '=', $cursoId)
            ->where('seccion_encuadre', 1)
            ->select('cierre_cursos.*')
            ->simplePaginate(30);
            
            $cierre_actividades=DB::table('cierre_cursos_actividades')
            ->join('cierre_cursos','cierre_cursos.id', '=','cierre_cursos_actividades.cierre_cursos_id')
            ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
            ->where('cursos.id', '=', $cursoId)
            ->where('seccion_encuadre', 1)
            ->select('cierre_cursos_actividades.*')
            ->simplePaginate(30);
        }
       
        return view('cliente.seccion9a.showseccion9a',['cursoId' => $cursoId])->with('cierre_actividades',$cierre_actividades)
        ->with('cierre_cursos',$cierre_cursos);
    }

    public function edit($id)
    {
        $cierre_curso = cierre_curso::findOrFail($id);
        $curso_id = $cierre_curso->cursos_id; // Accede al id del curso
        return view('cliente.seccion9a.editseccion9a',compact('cierre_curso', 'curso_id'));
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
        ->where('cierre_cursos.seccion_encuadre', '=', 1)
        ->select('cierre_cursos.id')
        ->get();

        foreach ($desarrollo_Id as $desarrollo) {
            DB::table('cierre_cursos')
                ->where('id', $desarrollo->id)
                ->update(['etapa_encuadre' => $etapa_encuadre,'duracion' => $duracion,'tecnicas' => $tecnicas,'material_equipo_apoyo' => $material_equipo_apoyo]);
        }

        cierre_curso::where('id', '=', $id)->update($datos);
        return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }

    public function editactividad($id)
    {
        $cierre_actividad = cierre_cursos_actividade::findOrFail($id);
        $cierre_curso = cierre_curso::findOrFail($cierre_actividad->cierre_cursos_id); // Accede al cierre_curso asociado
        $curso_id = $cierre_curso->cursos_id; // Accede al id del curso
        return view('cliente.seccion9a.actividad',compact('cierre_actividad', 'curso_id'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
            cierre_cursos_actividade::where('id', '=', $id)->update($datosActividad);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }

    public function seguimiento9a($nombreVista, $CursoId)
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
