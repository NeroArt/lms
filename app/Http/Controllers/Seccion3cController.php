<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\subtema;
use App\Models\temario;
use App\Models\objetivo;
use App\Models\actividades_avance;
use Illuminate\Support\Facades\DB;

class Seccion3cController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }

    

    public function index()
    {
        $subtemas = DB::table('subtemas')
            ->join('temarios', 'temarios.id', '=', 'subtemas.temarios_id')
            ->join('objetivos', 'objetivos.id', '=', 'temarios.objetivos_id')
            ->join('cursos', 'cursos.id', '=', 'objetivos.cursos_id')
            ->where('cursos.users_id', '=', Auth::user()->id)
            ->select('subtemas.*')
            ->simplePaginate(30);
        return view('cliente.seccion3c.indexseccion3c')->with('subtemas', $subtemas);
    }
    public function create()
    {
        return view('cliente.seccion3c.createseccion3c');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        // Acceder al array de guests
        $subtemas  = $data['subtemas'];
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($subtemas  as $subtema) {
            $guardarSubtemas = [
                'subtema' => $subtema['subtema'],
                'temarios_id' => $subtema['id']
            ];
            // Insertar los datos en la tabla Objetivo
            subtema::insert($guardarSubtemas);
        }

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($subtemas),
            'data' => $subtemas
        ], 200);
    }

    public function show($cursoId)
    {
        $subtemas=DB::table('subtemas')
        ->join('temarios','temarios.id', '=','subtemas.temarios_id')
        ->join('objetivos','objetivos.id', '=','temarios.objetivos_id')
        ->join('cursos','cursos.id', '=','objetivos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->select('subtemas.*')
        ->simplePaginate(30);
        return view('cliente.seccion3c.showseccion3c',['cursoId' => $cursoId])->with('subtemas',$subtemas);
    }
    public function getTemas($IdObjetivo, $CursoId)
    {
        // Obtenemos el JSON y lo asignamos a la variable $datos
        $IdObjetivo = intval($IdObjetivo);
        $CursoId = intval($CursoId);

        // $Temas = DB::table('cursos')
        // ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        // ->join('temarios','temarios.objetivos_id', '=','objetivos.id')
        // ->where('cursos.id', '=', $CursoId)
        // ->where('objetivos.id', '=', $IdObjetivo )
        // ->select('temarios.id','temarios.tema','temarios.objetivos_id')
        // ->get();

        $temas = DB::select("
        SELECT id,tema ,objetivos_id  
        FROM lms.temarios tem
        where tem.objetivos_id = :objetivoId
        and not EXISTS(
            select 1
            from lms.subtemas sub
            where tem.id = sub.temarios_id
        )", [
            'objetivoId' => $IdObjetivo
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Los temas se consultaron correctamente',
            'data' => $temas,

        ], 200);
    }

    public function edit($id)
    {
        $subtema = subtema::findOrFail($id);
        $temario = temario::findOrFail($subtema->temarios_id); // Accede al temario asociado
        $objetivo = objetivo::findOrFail($temario->objetivos_id); // Accede al objetivo asociado
        $curso_id = $objetivo->cursos_id; // Accede al id del curso
        
        return view('cliente.seccion3c.editseccion3c', compact('subtema', 'curso_id'));
    }

    public function update(Request $request, $id)
    {
        $datosSubtema = request()->except(['_token', '_method']);
        if (Auth::user()->roles_id == 2) {
            subtema::where('id', '=', $id)->update($datosSubtema);
            return redirect('home')->with('Mensaje', 'Actividad modificada con éxito');
        }
    }

    public function seguimiento3c($nombreVista, $CursoId)
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
