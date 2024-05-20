@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion2.js'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 2</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
                         
                        </div>
                    </div>
                    <br>
                    <form action="{{url('/seccion2')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        
                        <input name="tipo_objetivo" type="text" class="form-control" id="tipo_objetivo" value="general" hidden>
                        <!-- Objetivo General: -->
                        <div class="mb-3">
                            <div class="name ">Objetivo General</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <textarea name="descripcion" id="descripcion" required autocomplete="descripcion" class="form-control"></textarea>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Sujeto  -->
                        
                        <div class="mb-3">
                            <div class="name ">Sujeto</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="sujeto" class="form-control" type="text" name="sujeto" autocomplete="Sujeto" value="El Participante" readonly>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <!-- Acción -->
                        <div class="mb-3">
                            <div class="name ">Acción</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <textarea name="accion" id="accion" required autocomplete="Acción" class="form-control"></textarea>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Condición -->
                        <div class="mb-3">
                            <div class="name ">Condición</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <textarea name="condicion" id="condicion" required autocomplete="Condición" class="form-control"></textarea>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                            <input name="cursos_id" type="number" class="form-control" id="cursos_id" value={{ session('idCurso') }} readonly hidden>
                    
                        <input type="submit" class="btn btn-success" value="Crear" id="save2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection