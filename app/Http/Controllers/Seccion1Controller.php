<?php

namespace App\Http\Controllers;

use App\Models\actividades_avance;
use App\Http\Controllers\Controller;
use App\Models\curso;
use App\Models\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->roles_id==1){
                $this->middleware('administrador');
            }
            if(Auth::user()->roles_id==2){
                $this->middleware('cliente');
            }
            if(Auth::user()->roles_id==3){
                $this->middleware('superadmin');
            }
            return $next($request);
        });
    }


    public function index()
    {

        if(Auth::user()->roles_id==2){
            $cursos=DB::table('cursos')
            ->where('cursos.users_id', Auth::id())
            ->select('cursos.*')
            ->simplePaginate(30);
            return view('cliente.seccion1.indexseccion1')->with('cursos',$cursos);
        }else{
            $cursos=DB::table('cursos')
            ->select('cursos.*')
            ->simplePaginate(30);
            return view('cliente.seccion1.indexseccion1')->with('cursos',$cursos);
        }

        
    }



    public function create()
    {
        return view('cliente.seccion1.createseccion1');
    }

    public function store(Request $request)
    {

        //Datos que se guardan en Curso
        $datosActividad=request()->except(['_token','_method']);
        curso::insert($datosActividad);

        if(Auth::user()->roles_id==2){
        // Obtenemos el id del ultimo curso, y lo enviamos al siguiente create
        $idCurso = DB::table('cursos')
        ->where('cursos.users_id', Auth::id())
        ->latest('id')
        ->value('id');
        }else{
            $idCurso = DB::table('cursos')
            ->latest('id')
            ->value('id');
        }


        $seccion1 = array(
            "seccion" => "Sección 1",
            "porcentaje_seccion" => 100,
            "status" => 1,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion1);

        $seccion2 = array(
            "seccion" => "Sección 2",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion2);

        $seccion3a = array(
            "seccion" => "Sección 3A",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion3a);

        $seccion3b = array(
            "seccion" => "Sección 3B",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion3b);

        $seccion3c = array(
            "seccion" => "Sección 3C",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion3c);

        $seccion3d = array(
            "seccion" => "Sección 3D",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion3d);

        $seccion4 = array(
            "seccion" => "Sección 4",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion4);

        $seccion5 = array(
            "seccion" => "Sección 5",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion5);

        $seccion6 = array(
            "seccion" => "Sección 6",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion6);

        $seccion7a = array(
            "seccion" => "Sección 7A",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion7a);

        $seccion7b = array(
            "seccion" => "Sección 7B",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion7b);

        $seccion7c = array(
            "seccion" => "Sección 7C",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion7c);

        $seccion7d = array(
            "seccion" => "Sección 7D",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion7d);

        $seccion8a = array(
            "seccion" => "Sección 8A",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion8a);

        $seccion8b = array(
            "seccion" => "Sección 8B",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion8b);

        $seccion8c = array(
            "seccion" => "Sección 8C",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion8c);

        $seccion8d = array(
            "seccion" => "Sección 8D",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion8d);

        $seccion8e = array(
            "seccion" => "Sección 8E",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion8e);

        $seccion8f = array(
            "seccion" => "Sección 8F",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion8f);

        $seccion9a = array(
            "seccion" => "Sección 9A",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9a);

        $seccion9b = array(
            "seccion" => "Sección 9B",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9b);

        $seccion9c = array(
            "seccion" => "Sección 9C",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9c);

        $seccion9d = array(
            "seccion" => "Sección 9D",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9d);

        $seccion9e = array(
            "seccion" => "Sección 9E",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9e);

        $seccion9f = array(
            "seccion" => "Sección 9F",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9f);

        $seccion9g = array(
            "seccion" => "Sección 9G",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9g);

        $seccion9h = array(
            "seccion" => "Sección 9H",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9h);

        $seccion9i = array(
            "seccion" => "Sección 9I",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9i);

        $seccion9j = array(
            "seccion" => "Sección 9J",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9j);

        $seccion9k = array(
            "seccion" => "Sección 9K",
            "porcentaje_seccion" => 0,
            "status" => 0,
            "cursos_id" => $idCurso
        );
        actividades_avance::insert($seccion9k);
        //"fecha_pago" =>  date('Y-m-d H:i:s'),
        $guardarPago = array(
            "id_transaccion" => "No aplica",
            "status" => "Pendiente",
            "fecha_pago" => date('Y-m-d H:i:s'),
            "monto_pago" => 0,
            "concepto_pago" => "Pago de Certificación",
            "metodo_pago" => "Pendiente",
            "cursos_id" => $idCurso,
            "nombre_usuario" => Auth::user()->name,
            "email_usuario" => Auth::user()->email
        );
        pago::insert($guardarPago);
      
        //var_dump($idCurso);
        return redirect('seccion2/create')->with('idCurso',$idCurso); 
        
    }

    public function show($cursoId)
    {
        if(Auth::user()->roles_id==2){
            $cursos=DB::table('cursos')
            ->where('cursos.users_id', Auth::id())
            ->where('cursos.id', '=', $cursoId)
            ->select('cursos.*')
            ->simplePaginate(30);
        }else{
            $cursos=DB::table('cursos')
            ->where('cursos.id', '=', $cursoId)
            ->select('cursos.*')
            ->simplePaginate(30);
        }

        return view('cliente.seccion1.showseccion1', ['cursoId' => $cursoId])->with('cursos',$cursos);
    }
    

    public function edit($id)
    {
        $curso=curso::findOrFail($id);
        return view('cliente.seccion1.editseccion1',compact('curso'));
    }

    public function update(Request $request, $id)
    { 
        $datosCurso=request()->except(['_token','_method']);
    
            curso::where('id', '=', $id)->update($datosCurso);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }
}
