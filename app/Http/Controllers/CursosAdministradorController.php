<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class CursosAdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrador');
    }

    public function index()
    {
        
        $cursos=DB::table('cursos')
        ->join('users','cursos.users_id', '=','users.id')
        ->where('users.roles_id', '=', 2)
        ->select('cursos.*','users.*')
        ->simplePaginate(30);

        return view('administrador.cursosadministrador.indexcursosadministrador')->with('cursos',$cursos);
    }
}
