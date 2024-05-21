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
        ->where('cursos.id', '=', $id)
        ->select('cursos.*')
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

        //Obtener datos de seccion3b y seccion3c
        $arrayTemario1 = [];
        $primerObjetivo = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->orderBy('objetivos.id', 'asc')
        ->first();
    
    if (!$primerObjetivo) {
        $templateProcessor->setValue('temasparticular1', '');
    } else {
        $Temas1 = DB::table('temarios')
            ->where('temarios.objetivos_id', '=', $primerObjetivo->id)
            ->select('temarios.*')
            ->get();
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
        $valorConcatenado1 = implode("<w:br/>", $arrayTemario1);
        $templateProcessor->setValue('temasparticular1', $valorConcatenado1);
    }

        $arrayTemario2 = [];
        $segundoObjetivo = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->orderBy('objetivos.id', 'asc')
        ->skip(1)
        ->first();
    
    if (!$segundoObjetivo) {
        $templateProcessor->setValue('temasparticular2', '');
    } else {
        $Temas2 = DB::table('temarios')
            ->where('temarios.objetivos_id', '=', $segundoObjetivo->id)
            ->select('temarios.*')
            ->get();
        foreach ($Temas2 as $tema) {
            array_push($arrayTemario2, $tema->tema);
            $Subtemas = DB::table('subtemas')
                ->where('subtemas.temarios_id', '=', $tema->id)
                ->select('subtemas.*')
                ->get();
            foreach ($Subtemas as $subtema) {
                array_push($arrayTemario2, $subtema->subtema);
            }
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenado2 = implode("<w:br/>", $arrayTemario2);
        $templateProcessor->setValue('temasparticular2', $valorConcatenado2);
    }

        $arrayTemario3 = [];
        $tercerObjetivo = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->orderBy('objetivos.id', 'asc')
        ->skip(2) // Omitir los dos primeros
        ->first();
    
    if (!$tercerObjetivo) {
        $templateProcessor->setValue('temasparticular3', '');
    } else {
        $Temas3 = DB::table('temarios')
            ->where('temarios.objetivos_id', '=', $tercerObjetivo->id)
            ->select('temarios.*')
            ->get();
        foreach ($Temas3 as $tema) {
            array_push($arrayTemario3, $tema->tema);
            $Subtemas = DB::table('subtemas')
                ->where('subtemas.temarios_id', '=', $tema->id)
                ->select('subtemas.*')
                ->get();
            foreach ($Subtemas as $subtema) {
                array_push($arrayTemario3, $subtema->subtema);
            }
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenado3 = implode("<w:br/>", $arrayTemario3);
        $templateProcessor->setValue('temasparticular3', $valorConcatenado3);
    }

    //Obtener datos de seccion3d
    $arrayBeneficioario1 = [];
    $primerBeneficio = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->orderBy('objetivos.id', 'asc') // Ordenar de manera descendente para obtener los más recientes
        ->first();
    
    if (!$primerBeneficio) {
        $templateProcessor->setValue('beneficiosparticular1', '');
    } else {
        $Beneficios1 = DB::table('beneficios')
            ->where('beneficios.objetivos_id', '=', $primerBeneficio->id)
            ->select('beneficios.*')
            ->get();
        foreach ($Beneficios1 as $beneficio) {
            array_push($arrayBeneficioario1, $beneficio->beneficio);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoBeneficio1 = implode("<w:br/>", $arrayBeneficioario1);
        $templateProcessor->setValue('beneficiosparticular1', $valorConcatenadoBeneficio1);
    }

    $arrayBeneficioario2 = [];
    $segundoBeneficio = DB::table('cursos')
        ->join('objetivos','objetivos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('objetivos.tipo_objetivo', '=', 'particular')
        ->select('objetivos.*')
        ->orderBy('objetivos.id', 'asc')
        ->skip(1) // Omitir los dos primeros
        ->first();
    
    if (!$segundoBeneficio) {
        $templateProcessor->setValue('beneficiosparticular2', '');
    } else {
        $Beneficios2 = DB::table('beneficios')
            ->where('beneficios.objetivos_id', '=', $segundoBeneficio->id)
            ->select('beneficios.*')
            ->get();
        foreach ($Beneficios2 as $beneficio) {
            array_push($arrayBeneficioario2, $beneficio->beneficio);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoBeneficio2 = implode("<w:br/>", $arrayBeneficioario2);
        $templateProcessor->setValue('beneficiosparticular2', $valorConcatenadoBeneficio2);
    }

    //Obtener datos de seccion4
    $arrayRequerimiento1 = [];
    $primerRequerimiento = DB::table('requerimientos')
        ->join('cursos','requerimientos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('requerimientos.descripcion', '=', '1')
        ->select('requerimientos.*')
        ->get();
    
    if (!$primerRequerimiento->count()) {
        $templateProcessor->setValue('requerimientos1', '');
    } else {
        foreach ($primerRequerimiento as $requerimiento) {
            array_push($arrayRequerimiento1, $requerimiento->requerimientos);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoRequerimiento1 = implode("<w:br/>", $arrayRequerimiento1);
        $templateProcessor->setValue('requerimientos1', $valorConcatenadoRequerimiento1);
    }

    $arrayRequerimiento2 = [];
    $segundoRequerimiento = DB::table('requerimientos')
        ->join('cursos','requerimientos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('requerimientos.descripcion', '=', '2')
        ->select('requerimientos.*')
        ->get();
    
    if (!$segundoRequerimiento->count()) {
        $templateProcessor->setValue('requerimientos2', '');
    } else {
        foreach ($segundoRequerimiento as $requerimiento) {
            array_push($arrayRequerimiento2, $requerimiento->requerimientos);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoRequerimiento2 = implode("<w:br/>", $arrayRequerimiento2);
        $templateProcessor->setValue('requerimientos2', $valorConcatenadoRequerimiento2);
    }

    $arrayRequerimiento3 = [];
    $tercerRequerimiento = DB::table('requerimientos')
        ->join('cursos','requerimientos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('requerimientos.descripcion', '=', '3')
        ->select('requerimientos.*')
        ->get();
    
    if (!$tercerRequerimiento->count()) {
        $templateProcessor->setValue('requerimientos3', '');
    } else {
        foreach ($tercerRequerimiento as $requerimiento) {
            array_push($arrayRequerimiento3, $requerimiento->requerimientos);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoRequerimiento3 = implode("<w:br/>", $arrayRequerimiento3);
        $templateProcessor->setValue('requerimientos3', $valorConcatenadoRequerimiento3);
    }

    $arrayRequerimiento4 = [];
    $cuartoRequerimiento = DB::table('requerimientos')
        ->join('cursos','requerimientos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('requerimientos.descripcion', '=', '4')
        ->select('requerimientos.*')
        ->get();
    
    if (!$cuartoRequerimiento->count()) {
        $templateProcessor->setValue('requerimientos4', '');
    } else {
        foreach ($cuartoRequerimiento as $requerimiento) {
            array_push($arrayRequerimiento4, $requerimiento->requerimientos);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoRequerimiento4 = implode("<w:br/>", $arrayRequerimiento4);
        $templateProcessor->setValue('requerimientos4', $valorConcatenadoRequerimiento4);
    }

    $arrayRequerimiento4 = [];
    $cuartoRequerimiento = DB::table('requerimientos')
        ->join('cursos','requerimientos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('requerimientos.descripcion', '=', '4')
        ->select('requerimientos.*')
        ->get();
    
    if (!$cuartoRequerimiento->count()) {
        $templateProcessor->setValue('requerimientos4', '');
    } else {
        foreach ($cuartoRequerimiento as $requerimiento) {
            array_push($arrayRequerimiento4, $requerimiento->requerimientos);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoRequerimiento4 = implode("<w:br/>", $arrayRequerimiento4);
        $templateProcessor->setValue('requerimientos4', $valorConcatenadoRequerimiento4);
    }

    $arrayRequerimiento5 = [];
    $quintoRequerimiento = DB::table('requerimientos')
        ->join('cursos','requerimientos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('requerimientos.descripcion', '=', '5')
        ->select('requerimientos.*')
        ->get();
    
    if (!$quintoRequerimiento->count()) {
        $templateProcessor->setValue('requerimientos5', '');
    } else {
        foreach ($quintoRequerimiento as $requerimiento) {
            array_push($arrayRequerimiento5, $requerimiento->requerimientos);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoRequerimiento5 = implode("<w:br/>", $arrayRequerimiento5);
        $templateProcessor->setValue('requerimientos5', $valorConcatenadoRequerimiento5);
    }

    $arrayRequerimiento6 = [];
    $sextoRequerimiento = DB::table('requerimientos')
        ->join('cursos','requerimientos.cursos_id', '=','cursos.id')
        ->where('cursos.id', '=', $id)
        ->where('requerimientos.descripcion', '=', '6')
        ->select('requerimientos.*')
        ->get();
    
    if (!$sextoRequerimiento->count()) {
        $templateProcessor->setValue('requerimientos6', '');
    } else {
        foreach ($sextoRequerimiento as $requerimiento) {
            array_push($arrayRequerimiento6, $requerimiento->requerimientos);
        }
        // Concatenas los valores en una cadena, con cada valor seguido de un salto de línea
        $valorConcatenadoRequerimiento6 = implode("<w:br/>", $arrayRequerimiento6);
        $templateProcessor->setValue('requerimientos6', $valorConcatenadoRequerimiento6);
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
