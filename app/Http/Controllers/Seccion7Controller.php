<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\inicio_curso;
use App\Models\inicio_actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion7Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $inicio_cursos=DB::table('inicio_cursos')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('seccion_encuadre', 1)
        ->select('inicio_cursos.*')
        ->simplePaginate(30);

        $inicio_actividades=DB::table('inicio_actividades')
        ->join('inicio_cursos','inicio_cursos.id', '=','inicio_actividades.inicio_cursos_id')
        ->join('cursos','cursos.id', '=','inicio_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('inicio_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion7.indexseccion7a')->with('inicio_actividades',$inicio_actividades)
        ->with('inicio_cursos',$inicio_cursos);
    }

    public function create()
    {
        return view('cliente.seccion7.createseccion7a');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $guardarEtapaInicio = $request->only(['etapa_encuadre','cursos_id','seccion_encuadre']);
        //Guardar en la tabla inicio_cursos
        inicio_curso::insert($guardarEtapaInicio);
        $Curso_Id = $request->only(['cursos_id']);
        $Inicio_Id = DB::table('inicio_cursos')
        ->where('cursos_id', $Curso_Id)
        ->where('seccion_encuadre', 1)
        ->select('inicio_cursos.id')
        ->first();
        // Acceder al array de guests
        $requerimientos  = $data['requerimientos'];
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($requerimientos  as $requerimiento) {
            $guardarRequerimientos=[
                'actividad'=>$requerimiento['actividad'],
                'duracion'=>$requerimiento['duracion'],
                'tecnicas'=>$requerimiento['tecnicas'],
                'material_equipo_apoyo'=>$requerimiento['material_equipo_apoyo'],
                'inicio_cursos_id'=>$Inicio_Id->id
            ];
            // Insertar los datos en la tabla Objetivo
            inicio_actividade::insert($guardarRequerimientos);
        }
 
                // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($requerimientos),
            'data' => $requerimientos
        ], 200);

    }

    public function edit($id)
    {
        $inicio_curso=inicio_curso::findOrFail($id);
        return view('cliente.seccion7.editseccion7a',compact('inicio_curso'));
    }

    public function update(Request $request, $id)
    { 
        $datosRequerimiento=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            inicio_curso::where('id', '=', $id)->update($datosRequerimiento);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

    public function editactividad($id)
    {
        $inicio_actividad=inicio_actividade::findOrFail($id);
        return view('cliente.seccion7.actividad',compact('inicio_actividad'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividada=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            inicio_actividade::where('id', '=', $id)->update($datosActividada);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

}
