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

    public function store(Request $request)
    {

        //Datos que se guardan en Curso
        $datosActividad=request()->except(['_token','_method']);
        curso::insert($datosActividad);

        // Obtenemos el id del ultimo curso, y lo enviamos al siguiente create
        $idCurso = DB::table('cursos')
        ->where('cursos.users_id', Auth::id())
        ->latest('id')
        ->value('id');
        
        //var_dump($idCurso);
        return redirect('seccion2/create')->with('idCurso',$idCurso); 

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

    public function plantilla_cliente($id)
    {
    // Obtener datos de la tabla cursos
    $datos = DB::table('cursos')
            ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
            ->where('cursos.id', '=', $id)
            ->select('cursos.*','objetivos.*')
            ->first();

                // Convertir el objeto stdClass en un array asociativo
    $datosAsociativo = (array) $datos;

            $ObjetivosParticulares = DB::table('cursos')
            ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
            ->where('cursos.id', '=', $id)
            ->where('objetivos.tipo_objetivo', '=', 'particular')
            ->select('objetivos.descripcion')
            ->get();

            // Convertir la colección a un array
$arrayObjetivosParticulares = $ObjetivosParticulares->toArray();
//Obtener los valores de descripciones
$arrayDescripciones = [];
foreach ($arrayObjetivosParticulares as $objetivo) {
    $arrayDescripciones[] = $objetivo->descripcion;
}
// Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
$valorConcatenado = implode("<w:br/>", $arrayDescripciones);



        $templateProcessor = new TemplateProcessor(resource_path('plantilla.docx'));
    // Primero, clonas la fila para cada valor en tu array
//$templateProcessor->cloneRow('mi_variable', count($valores));
// Luego, asignas cada valor a la variable correspondiente en la plantilla
//for ($i = 0; $i < count($valores); $i++) {
    //$templateProcessor->setValue('mi_variable#' . ($i + 1), $valores[$i]);
//}
foreach ($datosAsociativo as $clave => $valor) {
    $templateProcessor->setValue($clave, $valor);
    $templateProcessor->setValue('mi_variable', $valorConcatenado);
}

            // Guardar el archivo generado
    $outputPath = storage_path('app/public/generado.docx');
   $templateProcessor->saveAs($outputPath);

    // Descargar el archivo generado
    return response()->download($outputPath)->deleteFileAfterSend(true);


    }
    

}
