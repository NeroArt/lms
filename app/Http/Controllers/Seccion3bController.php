<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;
use App\Models\temario;
use App\Models\actividades_avance;
use App\Models\objetivo;


class Seccion3bController extends Controller
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
        $temas=DB::table('temarios')
        ->join('objetivos','objetivos.id', '=','temarios.objetivos_id')
        ->join('cursos','cursos.id', '=','objetivos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('temarios.*')
        ->simplePaginate(30);
        return view('cliente.seccion3b.indexseccion3b')->with('temas',$temas);
    }

    public function test()
    {
        return view('cliente.seccion1test');
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.seccion3b.createseccion3b');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        // Acceder al array de guests
        $temas  = $data['temas'];
        
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($temas  as $tema) {
            $guardarTemas=[
                'tema'=>$tema['tema'],
                'objetivos_id'=>$tema['objetivos_id']
            ];
            // Insertar los datos en la tabla Objetivo
            temario::insert($guardarTemas);
        }

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'data' => 1
            // NO SE POR QUE ESTABA ASI 'data' => $data
        ], 200);
    }

    public function show($cursoId)
    {
        if(Auth::user()->roles_id==2){
            $temas=DB::table('temarios')
            ->join('objetivos','objetivos.id', '=','temarios.objetivos_id')
            ->join('cursos','cursos.id', '=','objetivos.cursos_id')
            ->where('cursos.users_id', '=', Auth::user()->id)
            ->where('cursos.id', '=', $cursoId)
            ->select('temarios.*')
            ->simplePaginate(30);
            return view('cliente.seccion3b.showseccion3b',['cursoId' => $cursoId])->with('temas',$temas);
        }else{
            $temas=DB::table('temarios')
            ->join('objetivos','objetivos.id', '=','temarios.objetivos_id')
            ->join('cursos','cursos.id', '=','objetivos.cursos_id')
            ->where('cursos.id', '=', $cursoId)
            ->select('temarios.*')
            ->simplePaginate(30);
            return view('cliente.seccion3b.showseccion3b',['cursoId' => $cursoId])->with('temas',$temas);
        }
    }
    public function getDataObj($idCurso)
    {
        $tipoObjetivo = 'particular';
        $resultados = DB::select("
            SELECT obj.id, obj.descripcion
            FROM lms.objetivos obj
            WHERE
            obj.tipo_objetivo = :tipoObjetivo1
            AND obj.cursos_id = :idCurso1
            AND NOT EXISTS (
                SELECT 1
                FROM lms.temarios tem
                WHERE obj.id = tem.objetivos_id
                AND tem.objetivos_id IN (
                    SELECT obj.id
                    FROM lms.objetivos obj
                    WHERE
                    obj.tipo_objetivo = :tipoObjetivo2
                    AND obj.cursos_id = :idCurso2
                )
            )
        ", [
            'tipoObjetivo1' => $tipoObjetivo, 
            'idCurso1' => $idCurso,
            'tipoObjetivo2' => $tipoObjetivo, 
            'idCurso2' => $idCurso
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Los objetivos se consultaron correctamente',
            'count' => count($resultados),
            'data' => $resultados
        ], 200);
    }


    public function edit($id)
    {
        $temario = temario::findOrFail($id);
        $objetivo = objetivo::findOrFail($temario->objetivos_id); // Accede al objetivo asociado
        $curso_id = $objetivo->cursos_id; // Accede al id del curso
        return view('cliente.seccion3b.editseccion3b',compact('temario', 'curso_id'));
    }


    public function update(Request $request, $id)
    { 
        $datosTema=request()->except(['_token','_method']);
        temario::where('id', '=', $id)->update($datosTema);
        return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }

    public function seguimiento3b($nombreVista, $CursoId)
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
