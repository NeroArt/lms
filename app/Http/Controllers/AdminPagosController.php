<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pago;
use App\Models\curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrador');
    }

    public function index()
    {
        $cursos=DB::table('pagos')
        ->join('cursos','pagos.cursos_id', '=','cursos.id')
        ->join('users','cursos.users_id', '=','users.id')
        ->select('cursos.*','pagos.status','users.name','pagos.id as idpago')
        ->simplePaginate(30);
        return view('administrador.pagos.indexpagos')->with('cursos',$cursos);
    }

    public function show($idPago)
    {
        $pago = pago::findOrFail($idPago);
        return view('administrador.pagos.showpagos')->with('pago',$pago);
    }

    
}
