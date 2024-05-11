<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\actividades_avance;
use Illuminate\Support\Facades\DB;

class ActualizarSeguimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }

    public function actualizarSeguimiento($nombreVista, $CursoId)
    {
        // Obtenemos el JSON y lo asignamos a la variable $datos
        $nombreVista = strval($nombreVista);
        $CursoId = intval($CursoId);

        if( $nombreVista=="Sección 1" || $nombreVista=="Sección 2" || $nombreVista=="Sección 3A" || $nombreVista=="Sección 9B" || $nombreVista=="Sección 9C" || $nombreVista=="Sección 9D" || $nombreVista=="Sección 9E"){
            actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
            ->where('actividades_avances.seccion', '=', $nombreVista)
            ->update([
                'actividades_avances.porcentaje_seccion' => 100,
                'actividades_avances.status' => 1
            ]);
        }
        if($nombreVista == "Sección 3B"){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje en 33
            $nuevo_porcentaje = $porcentaje_actual + 33;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje > 100) {
                $nuevo_porcentaje = 100;
            }
            // Si el nuevo porcentaje es 99, ajústalo a 100
            if($nuevo_porcentaje == 99) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }
        if($nombreVista == "Sección 3C"){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje en 33
            $nuevo_porcentaje = $porcentaje_actual + 33;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje > 100) {
                $nuevo_porcentaje = 100;
            }
            // Si el nuevo porcentaje es 99, ajústalo a 100
            if($nuevo_porcentaje == 99) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }
        if($nombreVista == "Sección 3D"){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje en 33
            $nuevo_porcentaje = $porcentaje_actual + 33;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje > 100) {
                $nuevo_porcentaje = 100;
            }
            // Si el nuevo porcentaje es 99, ajústalo a 100
            if($nuevo_porcentaje == 99) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }

        if($nombreVista == "Sección 4" || $nombreVista == "Sección 7B" ){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje en 33
            $nuevo_porcentaje = $porcentaje_actual + 17;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje > 100) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }

        if($nombreVista == "Sección 5" || $nombreVista == "Sección 7C" || $nombreVista == "Sección 8C" || $nombreVista == "Sección 8D" || $nombreVista == "Sección 9A" || $nombreVista == "Sección 9H"){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje en 33
            $nuevo_porcentaje = $porcentaje_actual + 33;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje >= 99) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }
        if($nombreVista == "Sección 6" || $nombreVista == "Sección 7A" || $nombreVista == "Sección 7D" || $nombreVista == "Sección 9F" || $nombreVista == "Sección 9G" || $nombreVista == "Sección 9I" || $nombreVista == "Sección 9J" || $nombreVista == "Sección 9K"){
            actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
            ->where('actividades_avances.seccion', '=', $nombreVista)
            ->update([
                'actividades_avances.porcentaje_seccion' => 100,
                'actividades_avances.status' => 1
            ]);
        }
        if($nombreVista == "Sección 8A"){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje 
            $nuevo_porcentaje = $porcentaje_actual + 10;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje >= 100) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }
        if($nombreVista == "Sección 8B"){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje 
            $nuevo_porcentaje = $porcentaje_actual + 9;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje >= 99) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }
        if($nombreVista == "Sección 8E"){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje 
            $nuevo_porcentaje = $porcentaje_actual + 8;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje >= 96) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }
        if($nombreVista == "Sección 8F"){
            // Obtén el valor actual de porcentaje_seccion
            $porcentaje_actual = actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->value('actividades_avances.porcentaje_seccion');
        
            // Incrementa el porcentaje 
            $nuevo_porcentaje = $porcentaje_actual + 25;
        
            // Si el nuevo porcentaje es mayor que 100, ajústalo a 100
            if($nuevo_porcentaje >= 100) {
                $nuevo_porcentaje = 100;
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                'actividades_avances.status' => 1
                ]);
            }else{
                // Actualiza porcentaje_seccion y status
                actividades_avance::where('actividades_avances.cursos_id', '=', $CursoId)
                ->where('actividades_avances.seccion', '=', $nombreVista)
                ->update([
                    'actividades_avances.porcentaje_seccion' => $nuevo_porcentaje,
                    'actividades_avances.status' => 0
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Los temas se consultaron correctamente',
            'data' => $nombreVista,

        ], 200);
    }


}
