<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\pago;
use App\Models\curso;
use App\Models\transferencia;
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

        $pagos=DB::table('pagos')
        ->join('cursos','pagos.cursos_id', '=','cursos.id')
        ->where('cursos.users_id', Auth::id())
        ->select('cursos.*','pagos.status','pagos.id as idpago')
        ->simplePaginate(30);

        return view('cliente.pagos.indexpagos')->with('pagos',$pagos);
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

    public function show($id)
    {
        $pago=pago::findOrFail($id);
        $curso=curso::findOrFail($pago->cursos_id);
        return view('cliente.pagos.showpagocertificacion',compact('pago','curso'));
    }

    public function pagoupdate($id)
    {
        $transferencia=transferencia::findOrFail(1);
        $pago=pago::findOrFail($id);
        $curso=curso::findOrFail($pago->cursos_id);


        return view('cliente.pagos.pagocertificacion',compact('pago','transferencia','curso'));
    }

    public function update(Request $request, $id)
    { 
        $datosBeneficio=request()->except(['_token','_method']);
        $datosBeneficio["id_transaccion"] = "No aplica";
        $datosBeneficio["status"] = "En Proceso";
        $datosBeneficio["fecha_pago"] = date('Y-m-d H:i:s');
        $datosBeneficio["nombre_usuario"] = Auth::user()->name;
        $datosBeneficio["email_usuario"] = Auth::user()->email;
        pago::where('id', '=', $id)->update($datosBeneficio);
        return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }

}
