@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Modificacion de curso - Sección 5</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion5/'.$curso_id)}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion5/'.$evaluacione->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Requerimiento:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Requerimiento</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="aspecto" class="form-control" type="text" name="aspecto" autocomplete="evaluacione" value="{{isset($evaluacione->aspecto)?$evaluacione->aspecto:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div> 
                        
                        <div class="mb-3">
                            <div class="name">Requerimiento</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="porcentaje" class="form-control" type="number" name="porcentaje" autocomplete="porcentaje" value="{{isset($evaluacione->porcentaje)?$evaluacione->porcentaje:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="name">Requerimiento</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="instrumento_evaluacion" class="form-control" type="text" name="instrumento_evaluacion" autocomplete="instrumento_evaluacion" value="{{isset($evaluacione->instrumento_evaluacion)?$evaluacione->instrumento_evaluacion:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="name">Requerimiento</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="momento_aplicacion" class="form-control" type="text" name="momento_aplicacion" autocomplete="Requerimiento" value="{{isset($evaluacione->momento_aplicacion)?$evaluacione->momento_aplicacion:''}}" required>
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