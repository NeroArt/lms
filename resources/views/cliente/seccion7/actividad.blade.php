@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Modificacion de curso - Sección 6 A Actividad</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion7a/'.$curso_id)}}" class="btn btn-danger">Regresar</a>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion7actividad/'.$inicio_actividad->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Modificación de Previo al Inicio Del Curso:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Actividad</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" value="{{isset($inicio_actividad->actividad)?$inicio_actividad->actividad:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div> 
                        
                        <div class="mb-3">
                            <div class="name">Duración de la Actividad (En minutos)</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" value="{{isset($inicio_actividad->duracion)?$inicio_actividad->duracion:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="name">Técnicas</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" value="{{isset($inicio_actividad->tecnicas)?$inicio_actividad->tecnicas:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name">Material y Equipo de Apoyo</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" value="{{isset($inicio_actividad->material_equipo_apoyo)?$inicio_actividad->material_equipo_apoyo:''}}" required>
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