@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion9f.js'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 9F</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body" >
                            <div class="row">
                                <label for="">El instructor indicará las referencias bibliográficas /fuentes de información del aprendizaje del curso/sesión: </label>
                                <form action="" id="myForm">
                                    <div class="mb-3">
                                        <div class="name">Etapa</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" required>
                                                <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                        
                                    <div class="mb-3">
                                        <div class="name">Duración (Indicar cuantos minutos)</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="duracion_tiempo" class="form-control" type="number" name="duracion_tiempo" required>
                                                <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="name">Técnicas </div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
                                                <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                        
                                    <div class="mb-3">
                                        <div class="name">Material y Equipo de Apoyo</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="Requerimiento" required></textarea>
                                                <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                        
                                    <div class="mb-3">
                                        <div class="name">Redactar Actividad</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor redactará las referencias bibliográficas"></textarea>
                                                <span class="focus-input100 "></span>
                                            <span class="symbol-input100">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="">Redactar las fuentes referencias bibliográficas. </label>
                                        <label for="">Cantidad de referencias</label>
                                        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
                                    </div>

                                    <div id="divRequerimientos">
                                    
                                    </div>
                                    <button type="submit">Guardar</button>
                                </form>
                            </div>
                            <a href="{{url('/seccion9g/create')}}" class="btn btn-success">Siguiente</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection