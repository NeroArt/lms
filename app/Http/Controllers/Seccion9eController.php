<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\cierre_curso;
use App\Models\cierre_cursos_actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class Seccion9eController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $cierre_cursos=DB::table('cierre_cursos')
        ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('seccion_encuadre', 5)
        ->select('cierre_cursos.*')
        ->simplePaginate(30);
        
        $cierre_actividades=DB::table('cierre_cursos_actividades')
        ->join('cierre_cursos','cierre_cursos.id', '=','cierre_cursos_actividades.cierre_cursos_id')
        ->join('cursos','cursos.id', '=','cierre_cursos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('cierre_cursos_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion9e.indexseccion9e')->with('cierre_actividades',$cierre_actividades)
        ->with('cierre_cursos',$cierre_cursos);
    }

    public function create()
    {
        return view('cliente.seccion9e.createseccion9e');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $Curso_Id = $request->only(['cursos_id']);
        $nuevoElemento = [
            'etapa_encuadre' => $data['etapa_encuadre'],
            'duracion' => $data['duracion'],
            'tecnicas' => $data['tecnicas'],
            'material_equipo_apoyo' => $data['material_equipo_apoyo'],
            'seccion_encuadre' => $data['seccion_encuadre'],
            'cursos_id' => $data['cursos_id']
        ];

        cierre_curso::insert($nuevoElemento);

        $Inicio_Id = DB::table('cierre_cursos')
        ->join('cursos', 'cierre_cursos.cursos_id', '=', 'cursos.id')
        ->where('cursos_id', $Curso_Id['cursos_id'])
        ->where('seccion_encuadre', 5)
        ->select('cierre_cursos.id')
        ->orderBy('id', 'desc')
        ->first();
    
    //Guardar datos en tabla actividades
    $Actividades  = $data['actividades'];
    $arrayVacio = [];
    //Guardar actividad
    $nuevoElemento2 = [
        'actividad' => $data['actividad'],
        'cierre_cursos_id' => $Inicio_Id->id
    ];
    $arrayVacio[] = $nuevoElemento2; 
    // Puedes iterar sobre el array de guests y acceder a cada objeto
    foreach ($Actividades  as $actividad) {
        $nuevoElemento = [
            'actividad' => $actividad['actividad'],
            'cierre_cursos_id' => $Inicio_Id->id
        ];
        $arrayVacio[] = $nuevoElemento; 
    }  
    // Insertar los datos en la tabla
    foreach ($arrayVacio as $elemento) {
        cierre_cursos_actividade::insert($elemento);
    }


        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($data),
            'data' => $data
        ], 200);
    }

    public function edit($id)
    {
        $cierre_curso=cierre_curso::findOrFail($id);
        return view('cliente.seccion9e.editseccion9e',compact('cierre_curso'));
    }

    public function update(Request $request, $id)
    { 
        $datos=request()->except(['_token','_method']);
        $cursos_id=request()->only(['cursos_id']);
        $etapa_encuadre = $datos['etapa_encuadre'];
        $duracion = $datos['duracion'];
        $tecnicas = $datos['tecnicas'];
        $material_equipo_apoyo = $datos['material_equipo_apoyo'];

        $desarrollo_Id = DB::table('cierre_cursos')
        ->where('cierre_cursos.cursos_id', '=', $cursos_id)
        ->where('cierre_cursos.seccion_encuadre', '=', 5)
        ->select('cierre_cursos.id')
        ->get();

        foreach ($desarrollo_Id as $desarrollo) {
            DB::table('cierre_cursos')
                ->where('id', $desarrollo->id)
                ->update(['etapa_encuadre' => $etapa_encuadre,'duracion' => $duracion,'tecnicas' => $tecnicas,'material_equipo_apoyo' => $material_equipo_apoyo]);
        }

        if (Auth::user()->roles_id==2) {
            cierre_curso::where('id', '=', $id)->update($datos);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }

    }

    public function editactividad($id)
    {
        $cierre_actividad=cierre_cursos_actividade::findOrFail($id);
        return view('cliente.seccion9e.actividad',compact('cierre_actividad'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            cierre_cursos_actividade::where('id', '=', $id)->update($datosActividad);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

}
