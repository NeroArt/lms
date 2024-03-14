@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/password_toggle.js'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Crear Actividades</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        
                        <div class="col">
                            <a href="{{url('/actividades')}}" class="btn btn-danger">Regresar</a>
                        </div>

                    </div>
                    <br>
                    <form action="{{url('/actividades/'.$actividad->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="mb-3">
                            <div class="name ">Actividad</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="actividad" class="form-control" type="text" name="actividad" value="{{isset($actividad->actividad)?$actividad->actividad:''}}" required autofocus autocomplete="Actividades">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Porcentaje de Actividad</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="porcentaje_actividad" class="form-control" type="number" name="porcentaje_actividad" value="{{isset($actividad->porcentaje_actividad)?$actividad->porcentaje_actividad:''}}" required autofocus autocomplete="Porcentaje">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Seleccionar Status</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <select name="status" id="status" class="form-control" required autofocus autocomplete="Status" >
                                        @if ($actividad->status == 1)
                                        <option value="1" style="background-color: rgb(215, 235, 35);">Actual: Activo</option>
                                        @endif
                                        @if ($actividad->status == 0)
                                        <option value="0" style="background-color: rgb(215, 235, 35);">Actual: Inactivo</option>
                                        @endif
                                        <option value="1" style="background-color: rgb(114, 224, 110);">Activo</option>
                                        <option value="0" style="background-color: rgb(219, 97, 97);">Inactivo</option>
                                    </select>
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