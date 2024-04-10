<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\previo_inicio;
use App\Models\previo_inicios_actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use DB;

class Seccion6Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $previo_inicios=DB::table('previo_inicios')
        ->select('previo_inicios.*')
        ->simplePaginate(30);

        $previo_inicios_actividades=DB::table('previo_inicios_actividades')
        ->select('previo_inicios_actividades.*')
        ->simplePaginate(30);


        return view('cliente.seccion6.indexseccion6')->with('previo_inicios_actividades',$previo_inicios_actividades)
        ->with('previo_inicios',$previo_inicios);
    }

    public function create()
    {
        return view('cliente.seccion6.createseccion6');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $guardarEtapaPrevio = $request->only(['etapa', 'duracion', 'material_equipo_de_apoyo', 'cursos_id']);
        //Guardar en la tabla previo_inicios
        previo_inicio::insert($guardarEtapaPrevio);
        $Curso_Id = $request->only(['cursos_id']);
        $Previo_Id = DB::table('previo_inicios')
        ->where('cursos_id', $Curso_Id)
        ->select('previo_inicios.id')
        ->first();
        // Acceder al array de guests
        $requerimientos  = $data['requerimientos'];
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($requerimientos  as $requerimiento) {
            $guardarRequerimientos=[
                'actividad'=>$requerimiento['requerimiento'],
                'previo_inicios_id'=>$Previo_Id->id
            ];
            // Insertar los datos en la tabla Objetivo
            previo_inicios_actividade::insert($guardarRequerimientos);
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
        $previo_inicio=previo_inicio::findOrFail($id);
        return view('cliente.seccion6.editseccion6',compact('previo_inicio'));
    }

    public function update(Request $request, $id)
    { 
        $datosRequerimiento=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            previo_inicio::where('id', '=', $id)->update($datosRequerimiento);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

    public function editactividad($id)
    {
        $previo_actividad=previo_inicios_actividade::findOrFail($id);
        return view('cliente.seccion6.actividad',compact('previo_actividad'));
    }

    public function updateactividad(Request $request, $id)
    { 
        $datosRequerimiento=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            previo_inicios_actividade::where('id', '=', $id)->update($datosRequerimiento);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

}
