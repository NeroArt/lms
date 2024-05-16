<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class SeguimientoSuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    
    public function index()
    {
        $cursos = DB::table('cursos')
        ->join('actividades_avances', 'cursos.id', '=', 'actividades_avances.cursos_id')
        ->join('users', 'cursos.users_id', '=', 'users.id')
        ->select('cursos.id','cursos.nombre_curso', 'cursos.descripcion_curso', 'users.name', DB::raw('SUM(actividades_avances.porcentaje_seccion)/30 as porcentaje_avance'))
        ->groupBy('cursos.id', 'cursos.nombre_curso', 'cursos.descripcion_curso','users.name')
        ->simplePaginate(30);
        return view('superadministrador.seguimiento.indexseguimiento')->with('cursos',$cursos);
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
        return view('superadministrador.seguimiento.showseguimiento', ['nombreCurso' => $nombreCurso])->with('avances',$avances);
    }

    public function indexGestionSeccionesSuperAdmin($cursoId)
    {
        return view('superadministrador.seguimiento.indexgestionsecciones', ['cursoId' => $cursoId]);
    }
}
