<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\transferencia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index()
    {
        $transferencias=DB::table('transferencias')
        ->select('transferencias.*')
        ->simplePaginate(30);

        return view('superadministrador.transferencias.indextransferencia')->with('transferencias',$transferencias);
    }

    public function create()
    {
        return view('superadministrador.transferencias.createtransferencia');
    }

    public function store(Request $request)
    {

        //Datos que se guardan en Usuarios
        $datos=request()->except(['_token','_method']);
        
        if (Auth::user()->roles_id==3) {
            transferencia::insert($datos);
            return redirect('transferencia')->with('Mensaje','No. de cuenta creado con éxito');
        }else{
            Auth::logout();
            return redirect('/');
        }
    }

    public function edit($id)
    {
        $transferencia=transferencia::findOrFail($id);
        return view('superadministrador.transferencias.edittransferencia',compact('transferencia'));
    }

    public function update(Request $request, $id)
    { 
        $datosTransferencia=request()->except(['_token','_method']);
        
        if (Auth::user()->roles_id==3) {
            transferencia::where('id', '=', $id)->update($datosTransferencia);
            return redirect('transferencia')->with('Mensaje','No. de cuenta editado con éxito');
        }else{
            Auth::logout();
            return redirect('/');
        }
       
       
    }
}
