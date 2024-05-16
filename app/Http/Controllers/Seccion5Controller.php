<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\evaluacione;
use App\Models\actividades_avance;
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

    public function show($cursoId)
    {
        if(Auth::user()->roles_id==2){
            $evaluaciones=DB::table('evaluaciones')
            ->join('cursos','cursos.id', '=','evaluaciones.cursos_id')
            ->where('cursos.users_id', '=', Auth::user()->id)
            ->where('cursos.id', '=', $cursoId)
            ->select('evaluaciones.*')
            ->simplePaginate(30);
            return view('cliente.seccion5.showseccion5',['cursoId' => $cursoId])->with('evaluaciones',$evaluaciones);
        }else{
            $evaluaciones=DB::table('evaluaciones')
            ->join('cursos','cursos.id', '=','evaluaciones.cursos_id')
            ->where('cursos.id', '=', $cursoId)
            ->select('evaluaciones.*')
            ->simplePaginate(30);
            return view('cliente.seccion5.showseccion5',['cursoId' => $cursoId])->with('evaluaciones',$evaluaciones);
        }

    }

    public function edit($id)
    {
        $evaluacione=evaluacione::findOrFail($id);
        $curso_id = $evaluacione->cursos_id; // Accede al id del curso
        return view('cliente.seccion5.editseccion5',compact('evaluacione', 'curso_id'));
    }

    public function update(Request $request, $id)
    { 
        $datosEvaluacion=request()->except(['_token','_method']);
        evaluacione::where('id', '=', $id)->update($datosEvaluacion);
        return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }

    public function seguimiento5($nombreVista, $CursoId)
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
