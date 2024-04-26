<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;
class CursosClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $cursos=DB::table('cursos')
        ->where('cursos.users_id', Auth::id())
        ->select('cursos.*')
        ->simplePaginate(30);
        return view('cliente.gestioncursos.indexgestioncursos')->with('cursos',$cursos);
    }

    public function indexGestionSecciones($cursoId)
    {
        return view('cliente.gestioncursos.indexgestionsecciones', ['cursoId' => $cursoId]);
    }
}
