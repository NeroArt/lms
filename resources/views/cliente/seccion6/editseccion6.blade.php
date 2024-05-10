@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Modificacion de curso - Sección 6</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion6/'.$curso_id)}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion6/'.$previo_inicio->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Modificación de Previo al Inicio Del Curso:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Descripción</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="etapa" class="form-control" type="text" name="etapa" autocomplete="evaluacione" value="{{isset($previo_inicio->etapa)?$previo_inicio->etapa:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div> 
                        
                        <div class="mb-3">
                            <div class="name">Duración del evento (En minutos)</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="porcentaje" value="{{isset($previo_inicio->duracion)?$previo_inicio->duracion:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="name">Material y Equipo de Apoyo</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="material_equipo_de_apoyo" class="form-control" type="text" name="material_equipo_de_apoyo" autocomplete="instrumento_evaluacion" value="{{isset($previo_inicio->material_equipo_de_apoyo)?$previo_inicio->material_equipo_de_apoyo:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <input type="submit" class="btn btn-success" value="Modificar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection