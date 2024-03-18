<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use DB;

class Seccion1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        $cursos=DB::table('cursos')
        ->select('cursos.*')
        ->simplePaginate(30);
        return view('cliente.seccion1.indexseccion1')->with('cursos',$cursos);
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
        return view('cliente.seccion1.createseccion1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datosActividad=request()->except(['_token','_method']);
        curso::insert($datosActividad);
        return redirect('/actividades')->with('Mensaje','Actividad agregada con éxito');

    }


    public function edit($id)
    {
        $curso=curso::findOrFail($id);
        return view('cliente.seccion1.editseccion1',compact('curso'));
    }


    public function update(Request $request, $id)
    { 
        $datosCurso=request()->except(['_token','_method']);
        if (Auth::user()->roles_id==2) {
            curso::where('id', '=', $id)->update($datosCurso);
            return redirect('actividades')->with('Mensaje','Actividad modificada con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    //Intento generar una plantilla, necesito un array con los datos de la tabla cursos y pasarlos al TemplateProcessor 
    public function plantilla_cliente($id)
    {
    // Obtener datos de la tabla cursos
    $datos = DB::table('cursos')
            ->where('cursos.id', '=', $id)
            ->select('cursos.*')
            ->first();

    // Convertir el objeto stdClass en un array asociativo
    $datos = (array) $datos;

    // Mostrar los datos para verificar que se obtuvieron correctamente
    //var_dump($datos);
    //echo($datos);
        // Cargar la plantilla
        $templateProcessor = new TemplateProcessor(resource_path('plantilla.docx'));
        // Reemplazar marcadores en la plantilla con datos dinámicos
    foreach ($datos as $clave => $valor) {
        $templateProcessor->setValue($clave, $valor);
    }

    // Guardar el archivo generado
    $outputPath = storage_path('app/public/generado.docx');
    $templateProcessor->saveAs($outputPath);

    // Descargar el archivo generado
    return response()->download($outputPath)->deleteFileAfterSend(true);

      
    }
}
