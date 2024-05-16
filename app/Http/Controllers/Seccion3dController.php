<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\beneficio;
use App\Models\objetivo;
use App\Models\actividades_avance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion3dController extends Controller
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
        $beneficios=DB::table('beneficios')
        ->join('objetivos','objetivos.id', '=','beneficios.objetivos_id')
        ->join('cursos','cursos.id', '=','objetivos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('beneficios.*')
        ->simplePaginate(30);
        return view('cliente.seccion3d.indexseccion3d')->with('beneficios',$beneficios);
    }

    public function create()
    {
        return view('cliente.seccion3d.createseccion3d');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $objetivo_id = intval($data['indice']);
        // Acceder al array de guests
        $beneficios  = $data['beneficios'];
      
        $arrayVacio = [];
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($beneficios  as $beneficio) {
            $nuevoElemento = [
                'beneficio' => $beneficio['beneficio'],
                // Añade aquí los datos adicionales que quieras
                'objetivos_id' => $objetivo_id
            ];
            $arrayVacio[] = $nuevoElemento; 
        }  
        // Insertar los datos en la tabla
        foreach ($arrayVacio as $elemento) {
            beneficio::insert($elemento);
        }

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',   
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($beneficios),
            'data' => $beneficios
        ], 200);

    }

    public function show($cursoId)
    {
        if(Auth::user()->roles_id==2){
            $beneficios=DB::table('beneficios')
            ->join('objetivos','objetivos.id', '=','beneficios.objetivos_id')
            ->join('cursos','cursos.id', '=','objetivos.cursos_id')
            ->where('cursos.users_id', '=', Auth::user()->id)
            ->where('cursos.id', '=', $cursoId)
            ->select('beneficios.*')
            ->simplePaginate(30);
            return view('cliente.seccion3d.showseccion3d',['cursoId' => $cursoId])->with('beneficios',$beneficios);
        }else{
            $beneficios=DB::table('beneficios')
            ->join('objetivos','objetivos.id', '=','beneficios.objetivos_id')
            ->join('cursos','cursos.id', '=','objetivos.cursos_id')
            ->where('cursos.id', '=', $cursoId)
            ->select('beneficios.*')
            ->simplePaginate(30);
            return view('cliente.seccion3d.showseccion3d',['cursoId' => $cursoId])->with('beneficios',$beneficios);
        }

    }

    public function edit($id)
    {
        $beneficio = beneficio::findOrFail($id);
        $objetivo = objetivo::findOrFail($beneficio->objetivos_id); // Accede al objetivo asociado
        $curso_id = $objetivo->cursos_id; // Accede al id del curso
        return view('cliente.seccion3d.editseccion3d',compact('beneficio', 'curso_id'));
    }

    public function update(Request $request, $id)
    { 
        $datosBeneficio=request()->except(['_token','_method']);
            beneficio::where('id', '=', $id)->update($datosBeneficio);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }

    public function seguimiento3d($nombreVista, $CursoId)
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
