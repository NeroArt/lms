<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\actividades_avance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use DB;

class SeguimientoActividadesClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }

    public function index()
    {
        $id=3;
        $seguimientos=DB::table('actividades_avances')
        ->join('cursos','cursos.id', '=','actividades_avances.cursos_id')
        ->where('actividades_avances.cursos_id',$id )
        ->select('actividades_avances.*','cursos.nombre_curso as nombre_curso')
        ->simplePaginate(30);
        

        return view('cliente.seguimientocliente.indexseguimiento')
        ->with('seguimientos',$seguimientos);
    }

    public function seguimiento_actividades ($id)
    {
        $datos = DB::table('cursos')
        ->where('cursos.id', '=', $id)
        ->select('cursos.*')
        ->first();

        $actividades_curso = DB::table('actividades_avances')
        ->where('actividades_avances.cursos_id', '=', $id)
        ->select('actividades_avances.*')
        ->first();

        if (empty($actividades_curso)) {

            if (empty($datos)) 
                {
                    echo "No se encontraron registros.";
                }else{
                    echo "Se guarda registros por primera vez.";
                    foreach ($datos as $clave => $valor) {
                        if ($valor === null || $valor === "") {
                            if ($clave==="created_at" || $clave==="updated_at" || $clave==="id") {
                                echo "Son campos inecesarios.";
                            }else{
                                $guardarRegistro=[
                                    'actividad'=>$clave,
                                    'porcentaje_actividad'=>10,
                                    'status'=>0,
                                    'cursos_id'=>$id
                                ];
                                // Insertar los datos en la tabla 
                                actividades_avance::insert($guardarRegistro);
                            }

                        } else {
                            if($clave==="created_at" || $clave==="updated_at" || $clave==="id"){
                                echo "Son campos inecesarios.";
                            }else{
                                $guardarRegistro=[
                                    'actividad'=>$clave,
                                    'porcentaje_actividad'=>10,
                                    'status'=>1,
                                    'cursos_id'=>$id
                                ];
                                // Insertar los datos en la tabla
                                actividades_avance::insert($guardarRegistro);
                            }
                            
                        }
                    }
                }
           
           
        } else {
            echo "Se encontraron registros.";
            foreach ($datos as $clave => $valor) {
                if ($valor === null || $valor === "") {
                    if ($clave==="created_at" || $clave==="updated_at" || $clave==="id") {
                        echo "Son campos inecesarios.";
                    }else{
                        $updatedRegistro = [
                            'actividad' => $clave,
                            'porcentaje_actividad' => 10,
                            'status' => 0,
                            'cursos_id' => $id
                        ];
                        actividades_avance::where('actividad', $clave)->update($updatedRegistro);
                    }
                } else {
                    if($clave==="created_at" || $clave==="updated_at" || $clave==="id"){
                        echo "Son campos inecesarios.";
                    }else{
                        $updatedRegistro = [
                            'actividad' => $clave,
                            'porcentaje_actividad' => 10,
                            'status' => 1,
                            'cursos_id' => $id
                        ];
                        actividades_avance::where('actividad', $clave)->update($updatedRegistro);
                    }
                }
            }
        }

        $total_actividades=DB::table('actividades_avances')
        ->where('actividades_avances.cursos_id', '=', $id)
        ->select('actividades_avances.id')
        ->count();

        $actividades_realizadas=DB::table('actividades_avances')
        ->where('actividades_avances.cursos_id', '=', $id)
        ->where('actividades_avances.status', '=', 1)
        ->select('actividades_avances.id')
        ->count();

        
        if ($total_actividades > 0) {
            $porcentaje_realizadas = ($actividades_realizadas / $total_actividades) * 100;
            echo "El porcentaje de actividades realizadas es: " . $porcentaje_realizadas . "%";
        } else {
            echo "No hay actividades para este curso.";
        }
       

    }


}
