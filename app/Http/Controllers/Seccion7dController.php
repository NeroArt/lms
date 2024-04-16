<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\curso;
use App\Models\inicio_curso;
use App\Models\inicio_actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion7dController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $inicio_cursos=DB::table('inicio_cursos')
        ->where('seccion_encuadre', 4)
        ->select('inicio_cursos.*')
        ->simplePaginate(30);
        
        $inicio_actividades=DB::table('inicio_actividades')
        ->select('inicio_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion7d.indexseccion7d')->with('inicio_actividades',$inicio_actividades)
        ->with('inicio_cursos',$inicio_cursos);
    }

    public function create()
    {
        return view('cliente.seccion7d.createseccion7d');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $Actividades  = $data['actividades'];
        $Curso_Id = $request->only(['cursos_id']);
        $guardarEtapaInicio = $request->only(['etapa_encuadre','cursos_id','seccion_encuadre']);
        // Guardar en la tabla inicio_cursos
        inicio_curso::insert($guardarEtapaInicio);
        $Inicio_Id = DB::table('inicio_cursos')
            ->where('cursos_id', $Curso_Id['cursos_id'])
            ->where('seccion_encuadre', 4)
            ->select('inicio_cursos.id')
            ->orderBy('id', 'desc')
            ->first();
        
        //Guardar datos en tabla actividades
        $Actividades  = $data['actividades'];
        $duracion = $data['duracion'];
        $tecnicas = $data['tecnicas'];
        $material_equipo_apoyo = $data['material_equipo_apoyo'];
        $arrayVacio = [];
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($Actividades  as $actividad) {
            $nuevoElemento = [
                'actividad' => $actividad['actividad'],
                // Añade aquí los datos adicionales que quieras
                'duracion' => $duracion,
                'tecnicas' => $tecnicas,
                'material_equipo_apoyo' => $material_equipo_apoyo,
                'inicio_cursos_id' => $Inicio_Id->id
            ];
            $arrayVacio[] = $nuevoElemento; 
        }  

        // Insertar los datos en la tabla
        foreach ($arrayVacio as $elemento) {
            inicio_actividade::insert($elemento);
        }

         // Devolver una respuesta JSON
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
        $inicio_curso=inicio_curso::findOrFail($id);
        return view('cliente.seccion7d.editseccion7d',compact('inicio_curso'));
    }

    public function update(Request $request, $id)
    { 
        $datos=request()->except(['_token','_method']);
        $cursos_id=request()->only(['cursos_id']);
        $etapa_encuadre = $datos['etapa_encuadre'];

        $inicio_Id = DB::table('inicio_cursos')
        ->where('inicio_cursos.cursos_id', '=', $cursos_id)
        ->where('inicio_cursos.seccion_encuadre', '=', 3)
        ->select('inicio_cursos.id')
        ->get();

        foreach ($inicio_Id as $inicio) {
            DB::table('inicio_cursos')
                ->where('id', $inicio->id)
                ->update(['etapa_encuadre' => $etapa_encuadre]);
        }

        if (Auth::user()->roles_id==2) {
            inicio_curso::where('id', '=', $id)->update($datos);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

    public function editactividad($id)
    {
        $inicio_actividade=inicio_actividade::findOrFail($id);
        return view('cliente.seccion7d.actividad',compact('inicio_actividade'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosActividad=request()->except(['_token','_method']);
        $inicio_cursos_id=request()->only(['inicio_cursos_id']);
        $duracion = $datosActividad['duracion'];
        $tecnicas = $datosActividad['tecnicas'];
        $material_equipo_apoyo = $datosActividad['material_equipo_apoyo'];

        $actividades_Id = DB::table('inicio_actividades')
        ->where('inicio_actividades.inicio_cursos_id', '=', $inicio_cursos_id)
        ->select('inicio_actividades.id')
        ->get();

        foreach ($actividades_Id as $actividad) {
            DB::table('inicio_actividades')
                ->where('id', $actividad->id)
                ->update(['duracion' => $duracion, 'tecnicas' => $tecnicas,'material_equipo_apoyo' => $material_equipo_apoyo]);
        }

        if (Auth::user()->roles_id==2) {
            inicio_actividade::where('id', '=', $id)->update($datosActividad);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }

        
    }

}
