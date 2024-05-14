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

class SuperAdminPagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index()
    {
        $cursos=DB::table('cursos')
        ->join('pagos','pagos.cursos_id', '=','cursos.id')
        ->join('users','cursos.users_id', '=','users.id')
        ->select('cursos.*','pagos.status','users.name')
        ->simplePaginate(30);
        return view('superadministrador.pagos.indexpagos')->with('cursos',$cursos);
    }

    public function show($idPago)
    {
        $pago = pago::findOrFail($idPago);
        return view('superadministrador.pagos.showpagos')->with('pago',$pago);
    }

    public function edit($id)
    {
        $pago = pago::findOrFail($id);
        $curso = curso::findOrFail($pago->cursos_id);
       
       
        return view('superadministrador.pagos.editpagos',compact('pago','curso'));
    }

    public function update(Request $request, $id)
    { 
        $datosPago=request()->except(['_token','_method']);
        
        if (Auth::user()->roles_id==3) {
            pago::where('id', '=', $id)->update($datosPago);
            return redirect('superadminpagos')->with('Mensaje','Pago editado con éxito');
        }else{
            Auth::logout();
            return redirect('/');
        }
    }


}
