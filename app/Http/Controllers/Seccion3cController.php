<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\subtema;
use DB;

class Seccion3cController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
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
            $guardarSubtemas=[
                'subtema'=>$subtema['subtema'],
                'temarios_id'=>$subtema['id']
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

    public function getTemas($IdObjetivo, $CursoId)
    {
        // Obtenemos el JSON y lo asignamos a la variable $datos
        $IdObjetivo = intval($IdObjetivo);
        $CursoId = intval($CursoId);

        $Temas = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->join('temarios','temarios.objetivos_id', '=','objetivos.id')
        ->where('cursos.id', '=', $CursoId)
        ->where('objetivos.id', '=', $IdObjetivo )
        ->select('temarios.id','temarios.tema','temarios.objetivos_id')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $Temas,

        ], 200);
    }
}
