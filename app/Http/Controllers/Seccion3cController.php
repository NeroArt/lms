<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Actividades;
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
        ->where('temarios.tipos_temas_id', '=', 1 )
        ->select('temarios.id','temarios.tema','temarios.objetivos_id')
        ->get();

        /*$IdObjetivo  = $data->IdObjetivo;
               $CursoId  = $data->CursoId;*/
        // Realizamos la consulta SQL 

        // Devolvemos la respuesta al frontend
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $Temas,

        ], 200);
    }
}
