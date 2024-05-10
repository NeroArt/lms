@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 2</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion2/'.$curso_id)}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion2/'.$objetivo->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <input name="tipo_objetivo" type="text" class="form-control" id="tipo_objetivo" value="general" hidden>
                        <!-- Objetivo General: -->
                        <div class="container mt-5">
                            <div>
                                <h2>Objetivo General:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name ">Objetivo General</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="descripcion" class="form-control" type="text" name="descripcion" autocomplete="Objetivo General " value="{{isset($objetivo->descripcion)?$objetivo->descripcion:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Sujeto  -->
                        <div class="container mt-5">
                            <div>
                                <h2>Sujeto:</h2>
                            </div>
                            <div class="card">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Sujeto</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="sujeto" class="form-control" type="text" name="sujeto" autocomplete="Sujeto" value="{{isset($objetivo->sujeto)?$objetivo->sujeto:''}}" readonly>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <!-- Acción -->
                        <div class="container mt-5">
                            <div>
                                <h2>Acción:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name ">Acción</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="accion" class="form-control" type="text" name="accion" autocomplete="Acción" value="{{isset($objetivo->accion)?$objetivo->accion:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Condición -->
                        <div class="container mt-5">
                            <div>
                                <h2>Condición:</h2>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Condición</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="condicion" class="form-control" type="text" name="condicion" autocomplete="Condición" value="{{isset($objetivo->condicion)?$objetivo->condicion:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                  
                        <input name="cursos_id" type="number" class="form-control" id="cursos_id" value="{{isset($objetivo->cursos_id)?$objetivo->cursos_id:''}}" hidden readonly>
                        
                        <input type="submit" class="btn btn-success" value="Modificar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection