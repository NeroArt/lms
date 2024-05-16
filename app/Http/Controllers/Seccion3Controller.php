<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\objetivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion3Controller extends Controller
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
        $objetivos=DB::table('objetivos')
        ->join('cursos','cursos.id', '=','objetivos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('objetivos.tipo_objetivo', '=', "particular")
        ->select('objetivos.*')
        ->simplePaginate(30);
        return view('cliente.seccion3.indexseccion3')->with('objetivos',$objetivos);
    }

    public function test()
    {
        return view('cliente.seccion1test');
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.seccion3.createseccion3');
    }


    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        // Acceder al array de guests
        $objetivos  = $data['guests'];
        // // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($objetivos  as $objetivo) {
            
            $datosObjetivo=[
                'tipo_objetivo'=>$objetivo['tipo_objetivo'],
                'descripcion'=>$objetivo['descripcion'],
                'sujeto'=>$objetivo['sujeto'],
                'accion'=>$objetivo['accion'],
                'condicion'=>$objetivo['condicion'],
                'cursos_id'=>$objetivo['cursos_id'],
            ];

            objetivo::insert($datosObjetivo);
            
        }

        $idCurso=$data['cursos_id'];
        $datosObjetivos = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $idCurso)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->get();

                // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            
            'dataObjetivos' => $datosObjetivos
        ], 200);

    }

    public function show($cursoId)
    {
        if(Auth::user()->roles_id==2){
            $objetivos=DB::table('objetivos')
            ->join('cursos','cursos.id', '=','objetivos.cursos_id')
            ->where('cursos.users_id', '=', Auth::user()->id)
            ->where('cursos.id', '=', $cursoId)
            ->where('objetivos.tipo_objetivo', '=', "particular")
            ->select('objetivos.*')
            ->simplePaginate(30);
            return view('cliente.seccion3.showseccion3',['cursoId' => $cursoId])->with('objetivos',$objetivos);
        }else{
            $objetivos=DB::table('objetivos')
            ->join('cursos','cursos.id', '=','objetivos.cursos_id')
            ->where('cursos.id', '=', $cursoId)
            ->where('objetivos.tipo_objetivo', '=', "particular")
            ->select('objetivos.*')
            ->simplePaginate(30);
            return view('cliente.seccion3.showseccion3',['cursoId' => $cursoId])->with('objetivos',$objetivos);
        }

    }

    public function edit($id)
    {
        $objetivo=objetivo::findOrFail($id);
        $curso_id = $objetivo->cursos_id;
        return view('cliente.seccion3.editseccion3',compact('objetivo', 'curso_id'));
    }


    public function update(Request $request, $id)
    { 
        $datosObjetivo=request()->except(['_token','_method']);
        objetivo::where('id', '=', $id)->update($datosObjetivo);
        return redirect('home')->with('Mensaje','Actividad modificada con éxito');
    }
}
