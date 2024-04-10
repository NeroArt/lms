@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion6.js'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 6</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body" >
                            <div class="row">
                                <form action="" id="myForm">
                                    <div class="mb-3">
                                        <div class="name">Etapa</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="etapa" class="form-control" type="text" name="etapa" autocomplete="etapa">
                                                <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                        
                                    <div class="mb-3">
                                        <div class="name">Duración (Indicar cuantos minutos)</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion">
                                                <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                        
                                    <div class="mb-3">
                                        <div class="name">Material y Equipo de Apoyo</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="material_equipo_de_apoyo" class="form-control" type="text" name="material_equipo_de_apoyo" autocomplete="Requerimiento">
                                                <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                        

                                    <div>
                                        <label for="">Cantidad de Actividades</label>
                                        <input type="number" name="cantidadRequerimientos" id="cantidadRequerimientos">
                                    </div>

                                    <div id="divRequerimientos">
                                    
                                    </div>
                                    <button type="submit">Guardar</button>
                                </form>
                            </div>
                            <a href="{{url('/seccion7a/create')}}" class="btn btn-success">Siguiente</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection