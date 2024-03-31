<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\temario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use DB;

class Seccion3bController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    
    public function index()
    {
        $objetivos=DB::table('objetivos')
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
        return view('cliente.seccion3b.createseccion3b');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        // Acceder al array de guests
        $temas  = $data['temas'];
        // Puedes iterar sobre el array de guests y acceder a cada objeto
        foreach ($temas  as $tema) {
            $guardarTemas=[
                'tema'=>$tema['tema'],
                'objetivos_id'=>$tema['objetivos_id']
            ];
            // Insertar los datos en la tabla Objetivo
            temario::insert($guardarTemas);
        }
 
                // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Los datos se procesaron correctamente',
            // Si quieres devolver la cantidad de guests, puedes hacerlo así
            'quantity' => count($temas),
            'data' => $temas
        ], 200);

    }


    public function edit($id)
    {
        $objetivo=objetivo::findOrFail($id);
        return view('cliente.seccion3.editseccion3',compact('objetivo'));
    }


    public function update(Request $request, $id)
    { 
        $datosObjetivo=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            objetivo::where('id', '=', $id)->update($datosObjetivo);
            return redirect('home')->with('Mensaje','Actividad modificada con éxito');
        }
    }
}
