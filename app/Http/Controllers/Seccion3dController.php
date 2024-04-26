<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\beneficio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion3dController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function show($cursoId)
    {
        $beneficios=DB::table('beneficios')
        ->join('objetivos','objetivos.id', '=','beneficios.objetivos_id')
        ->join('cursos','cursos.id', '=','objetivos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->where('cursos.id', '=', $cursoId)
        ->select('beneficios.*')
        ->simplePaginate(30);
        return view('cliente.seccion3d.showseccion3d')->with('beneficios',$beneficios);
    }

    public function index()
    {
        $beneficios=DB::table('beneficios')
        ->join('objetivos','objetivos.id', '=','beneficios.objetivos_id')
        ->join('cursos','cursos.id', '=','objetivos.cursos_id')
        ->where('cursos.users_id', '=', Auth::user()->id)
        ->select('beneficios.*')
        ->simplePaginate(30);
        return view('cliente.seccion3d.indexseccion3d')->with('beneficios',$beneficios);
    }

    public function create()
    {
        return view('cliente.seccion3d.createseccion3d');
    }

    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        // Acceder al array de guests
        $beneficios  = $data['beneficios'];
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($beneficios  as $beneficio) {
            $guardarBeneficios=[
                'beneficio'=>$beneficio['beneficio'],
                'objetivos_id'=>$beneficio['objetivos_id']
            ];
            // Insertar los datos en la tabla Objetivo
            beneficio::insert($guardarBeneficios);
        }
 
                // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($beneficios),
            'data' => $beneficios
        ], 200);

    }

    public function edit($id)
    {
        $beneficio=beneficio::findOrFail($id);
        return view('cliente.seccion3d.editseccion3d',compact('beneficio'));
    }

    public function update(Request $request, $id)
    { 
        $datosBeneficio=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            beneficio::where('id', '=', $id)->update($datosBeneficio);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }

}
