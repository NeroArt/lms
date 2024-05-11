<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class SeguimientoClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $cursos = DB::table('cursos')
        ->join('actividades_avances', 'cursos.id', '=', 'actividades_avances.cursos_id')
        ->where('cursos.users_id', Auth::id())
        ->select('cursos.id','cursos.nombre_curso', 'cursos.descripcion_curso', DB::raw('SUM(actividades_avances.porcentaje_seccion)/30 as porcentaje_avance'))
        ->groupBy('cursos.id', 'cursos.nombre_curso', 'cursos.descripcion_curso')
        ->simplePaginate(30);
        return view('cliente.gestionseguimiento.indexcertificacion')->with('cursos',$cursos);
    }

    public function show($cursoId)
    {
        $nombreCurso = DB::table('cursos')
        ->where('id', $cursoId)
        ->value('nombre_curso');

        $avances = DB::table('actividades_avances')
        ->where('actividades_avances.cursos_id', $cursoId)
        ->select('actividades_avances.*')
        ->get();
        return view('cliente.gestionseguimiento.showseguimiento', ['nombreCurso' => $nombreCurso])->with('avances',$avances);
    }
}
