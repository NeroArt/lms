<?php

namespace App\Http\Controllers;

use App\Models\actividades_avance;
use App\Http\Controllers\Controller;
use App\Models\curso;
use App\Models\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;


class PlantillaClienteController extends Controller
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

    public function plantilla_cliente($id)
    {
        $templateProcessor = new TemplateProcessor(resource_path('plantilla.docx'));

        // Obtener datos de seccion1
        $datos = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->select('cursos.*','objetivos.*')
        ->first();

        $datosAsociativo = (array) $datos;
        foreach ($datosAsociativo as $clave => $valor) {
            $templateProcessor->setValue($clave, $valor);
            //$templateProcessor->setValue('mi_variable', $valorConcatenado);
        }

        // Obtener datos de seccion2
        $ObjetivoGeneral = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'general')
        ->select('objetivos.*')
        ->first();

        if (!isset($ObjetivoGeneral) || is_null($ObjetivoGeneral) || empty($ObjetivoGeneral)) {
            $templateProcessor->setValue('descripciongeneral', '');
            $templateProcessor->setValue('sujetogeneral', '');
            $templateProcessor->setValue('acciongeneral', '');
            $templateProcessor->setValue('condiciongeneral', ''); 
        }else{
            $templateProcessor->setValue('descripciongeneral', $ObjetivoGeneral->descripcion);
            $templateProcessor->setValue('sujetogeneral', $ObjetivoGeneral->sujeto);
            $templateProcessor->setValue('acciongeneral', $ObjetivoGeneral->accion);
            $templateProcessor->setValue('condiciongeneral', $ObjetivoGeneral->condicion); 
        }

        //Obtener datos de seccion3a
        $ObjetivosParticulares = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.descripcion')
        ->get();

        if (!isset($ObjetivosParticulares) || is_null($ObjetivosParticulares) || empty($ObjetivosParticulares)) {
            $templateProcessor->setValue('descripcionparticular', '');
        }else{
            // Convertir la colección a un array
            $arrayObjetivosParticulares = $ObjetivosParticulares->toArray();
            //Obtener los valores de descripciones
            $arrayDescripciones = [];
            foreach ($arrayObjetivosParticulares as $objetivo) {
            $arrayDescripciones[] = $objetivo->descripcion;
            }
            // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
            $valorConcatenado = implode("<w:br/>", $arrayDescripciones);
            $templateProcessor->setValue('mi_variable', $valorConcatenado);
        }

        $ObjetivosParticular1 = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->orderBy('objetivos.id', 'asc') // Asume que 'created_at' es el campo de fecha de creación
        ->first();
      
        if (!isset($ObjetivosParticular1) || is_null($ObjetivosParticular1) || empty($ObjetivosParticular1)) {
            $templateProcessor->setValue('sujetoparticular1', '');
            $templateProcessor->setValue('accionparticular1', '');
            $templateProcessor->setValue('condicionparticular1', '');
        }else{
            $templateProcessor->setValue('sujetoparticular1', $ObjetivosParticular1->sujeto);
            $templateProcessor->setValue('accionparticular1', $ObjetivosParticular1->accion);
            $templateProcessor->setValue('condicionparticular1', $ObjetivosParticular1->condicion);
        }

        $ObjetivosParticular2 = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->orderBy('objetivos.id', 'asc') // Asume que 'id' es el campo de ordenación
        ->skip(1) // Omitir el primer registro
        ->first();
      
        if (!isset($ObjetivosParticular2) || is_null($ObjetivosParticular2) || empty($ObjetivosParticular2)) {
            $templateProcessor->setValue('sujetoparticular2', '');
            $templateProcessor->setValue('accionparticular2', '');
            $templateProcessor->setValue('condicionparticular2', '');
        }else{
            $templateProcessor->setValue('sujetoparticular2', $ObjetivosParticular2->sujeto);
            $templateProcessor->setValue('accionparticular2', $ObjetivosParticular2->accion);
            $templateProcessor->setValue('condicionparticular2', $ObjetivosParticular2->condicion);
        }

        $ObjetivosParticular3 = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->orderBy('objetivos.id', 'asc') // Asume que 'created_at' es el campo de fecha de creación
        ->first();
      
        if (!isset($ObjetivosParticular3) || is_null($ObjetivosParticular3) || empty($ObjetivosParticular3)) {
            $templateProcessor->setValue('sujetoparticular3', '');
            $templateProcessor->setValue('accionparticular3', '');
            $templateProcessor->setValue('condicionparticular3', '');
        }else{
            $templateProcessor->setValue('sujetoparticular3', $ObjetivosParticular3->sujeto);
            $templateProcessor->setValue('accionparticular3', $ObjetivosParticular3->accion);
            $templateProcessor->setValue('condicionparticular3', $ObjetivosParticular3->condicion);
        }

        //Obtener datos de seccion3b
        $arrayTemario1 = [];

        $Temas1 = DB::table('cursos')
            ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
            ->join('temarios','temarios.objetivos_id', '=','objetivos.id')
            ->where('cursos.id', '=', $id)
            ->select('temarios.*')
            ->get();
        
        if ($Temas1->isEmpty()) {
            $templateProcessor->setValue('temasparticular1', '');
        } else {
            foreach ($Temas1 as $tema) {
                array_push($arrayTemario1, $tema->tema);
                $Subtemas = DB::table('subtemas')
                    ->where('subtemas.temarios_id', '=', $tema->id)
                    ->select('subtemas.*')
                    ->get();
                foreach ($Subtemas as $subtema) {
                    array_push($arrayTemario1, $subtema->subtema);
                }
            }
            // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
            $valorConcatenado = implode("<w:br/>", $arrayTemario1);
            $templateProcessor->setValue('temasparticular1', $valorConcatenado);
        }



       
    // Primero, clonas la fila para cada valor en tu array
//$templateProcessor->cloneRow('mi_variable', count($valores));
// Luego, asignas cada valor a la variable correspondiente en la plantilla
//for ($i = 0; $i < count($valores); $i++) {
    //$templateProcessor->setValue('mi_variable#' . ($i + 1), $valores[$i]);
//}


            // Guardar el archivo generado
    $outputPath = storage_path('app/public/generado.docx');
   $templateProcessor->saveAs($outputPath);

    // Descargar el archivo generado
    return response()->download($outputPath)->deleteFileAfterSend(true);


    }
}
