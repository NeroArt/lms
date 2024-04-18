<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;


class PagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $cursos=DB::table('pagos')
        ->join('cursos','cursos.id', '=','pagos.cursos_id')
        ->where('cursos.users_id', Auth::id())
        ->select('cursos.*')
        ->simplePaginate(30);
        return view('cliente.pagos.indexpagos')->with('cursos',$cursos);
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $data["nombre_usuario"] =  Auth::user()->name;
        $data["email_usuario"] =  Auth::user()->email;
        $data["fecha_pago"] =  date('Y-m-d H:i:s');
       

        pago::insert($data);   
        
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            'data' => $data,

        ], 200);
        
    }

}
