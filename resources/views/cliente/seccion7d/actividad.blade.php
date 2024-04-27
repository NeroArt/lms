@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Modificacion de curso - Sección 7D Actividad</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion7d/'.$curso_id)}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion7dactividad/'.$inicio_actividade->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Modificación de Apertura al Inicio Del Curso:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Actividad</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" value="{{isset($inicio_actividade->actividad)?$inicio_actividade->actividad:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div> 
                        
                        <div class="mb-3">
                            <div class="name">Duración de la Actividad (En minutos)</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" value="{{isset($inicio_actividade->duracion)?$inicio_actividade->duracion:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="name">Técnicas</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" value="{{isset($inicio_actividade->tecnicas)?$inicio_actividade->tecnicas:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name">Material y Equipo de Apoyo</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" value="{{isset($inicio_actividade->material_equipo_apoyo)?$inicio_actividade->material_equipo_apoyo:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <input id="inicio_cursos_id" class="form-control" type="text" name="inicio_cursos_id" autocomplete="inicio_cursos_id" value="{{isset($inicio_actividade->inicio_cursos_id)?$inicio_actividade->inicio_cursos_id:''}}" required readonly hidden>

                        <input type="submit" class="btn btn-success" value="Modificar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection