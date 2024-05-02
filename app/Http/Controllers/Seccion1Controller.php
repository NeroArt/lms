<?php

namespace App\Http\Controllers;

use App\Models\actividades_avance;
use App\Http\Controllers\Controller;
use App\Models\curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

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
        ->where('cursos.users_id', Auth::id())
        ->select('cursos.*')
        ->simplePaginate(30);
        return view('cliente.seccion1.indexseccion1')->with('cursos',$cursos);
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

        // Obtenemos el id del ultimo curso, y lo enviamos al siguiente create
        $idCurso = DB::table('cursos')
        ->where('cursos.users_id', Auth::id())
        ->latest('id')
        ->value('id');

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
      
        //var_dump($idCurso);
        return redirect('seccion2/create')->with('idCurso',$idCurso); 
        
    }

    public function show($cursoId)
    {
        $cursos=DB::table('cursos')
        ->where('cursos.users_id', Auth::id())
        ->where('cursos.id', '=', $cursoId)
        ->select('cursos.*')
        ->simplePaginate(30);
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
