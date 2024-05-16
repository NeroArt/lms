<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\requerimiento;
use App\Models\actividades_avance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;
class Seccion4Controller extends Controller
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
        $requerimientos=DB::table('requerimientos')
        ->join('cursos','cursos.id', '=','requerimientos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('requerimientos.*')
        ->simplePaginate(30);
        return view('cliente.seccion4.indexseccion4')->with('requerimientos',$requerimientos);
    }

    public function create()
    {
        return view('cliente.seccion4.createseccion4');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        // Acceder al array de guests
        $requerimientos  = $data['requerimientos'];
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($requerimientos  as $requerimiento) {
            $guardarRequerimientos=[
                'requerimientos'=>$requerimiento['requerimiento'],
                'descripcion'=>$requerimiento['requerimientos_id'],
                'cursos_id'=>$requerimiento['cursos_id'],
            ];
            // Insertar los datos en la tabla Objetivo
            requerimiento::insert($guardarRequerimientos);
        }
 
                // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($requerimientos),
            'data' => $requerimientos
        ], 200);

    }

    public function show($cursoId)
    {
        if(Auth::user()->roles_id==2){
            $requerimientos=DB::table('requerimientos')
            ->join('cursos','cursos.id', '=','requerimientos.cursos_id')
            ->where('cursos.users_id', '=', Auth::user()->id)
            ->where('cursos.id', '=', $cursoId)
            ->select('requerimientos.*')
            ->simplePaginate(30);
            return view('cliente.seccion4.showseccion4',['cursoId' => $cursoId])->with('requerimientos',$requerimientos);
        }else{
            $requerimientos=DB::table('requerimientos')
            ->join('cursos','cursos.id', '=','requerimientos.cursos_id')
            ->where('cursos.id', '=', $cursoId)
            ->select('requerimientos.*')
            ->simplePaginate(30);
            return view('cliente.seccion4.showseccion4',['cursoId' => $cursoId])->with('requerimientos',$requerimientos);
        }

    }
    

    public function edit($id)
    {
        $requerimiento = requerimiento::findOrFail($id);
        $cursos_id = $requerimiento->cursos_id; // Accede al id del curso
        return view('cliente.seccion4.editseccion4',compact('requerimiento','cursos_id'));
    }

    public function update(Request $request, $id)
    { 
        $datosRequerimiento=request()->except(['_token','_method']);
        requerimiento::where('id', '=', $id)->update($datosRequerimiento);
        return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }

    public function seguimiento4($nombreVista, $CursoId)
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
