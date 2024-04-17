@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')
<div id="mySidenav" class="sidenav row container">
	<div class="mySidenavContainer">
		<div class="col-md-2"><a id="closeSidenav" href="javascript:void(0)" class="closebtn">&#9776;Cerrar</a></div>
		<div class="col-md-2"><a href="{{url('/seccion2')}}">Sección 1</a></div>
		<div class="col-md-2"><a href="{{url('/seccion3')}}">Sección 3</a></div>
		<div class="col-md-2"><a href="{{url('/seccion4')}}">Sección 4</a></div>
		<div class="col-md-2"><a href="{{url('/seccion5')}}">Sección 5</a></div>
		<div class="col-md-2"><a href="{{url('/seccion6')}}">Sección 6</a></div>
        <div class="col-md-2"><a href="{{url('/seccion7')}}">Sección 7</a></div>
		<div class="col-md-2"><a href="{{url('/seccion8')}}">Sección 8</a></div>
		<div class="col-md-2"><a href="{{url('/seccion9')}}">Sección 9</a></div>
	</div>
	<span id="mySidenavBackground"></span>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Modificacion de curso - Sección 8B</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion8b/'.$desarrollo_curso->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Modificación de Desarrollo del Curso:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Descripción de la Etapa de Desarrollo</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" value="{{isset($desarrollo_curso->etapa_encuadre)?$desarrollo_curso->etapa_encuadre:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div> 
                        
                        <div class="mb-3">
                            <div class="name">Duración de la Actividad (En minutos)</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" value="{{isset($desarrollo_curso->duracion)?$desarrollo_curso->duracion:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="name">Técnicas</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" value="{{isset($desarrollo_curso->tecnicas)?$desarrollo_curso->tecnicas:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name">Material y Equipo de Apoyo</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" value="{{isset($desarrollo_curso->material_equipo_apoyo)?$desarrollo_curso->material_equipo_apoyo:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <input id="cursos_id" class="form-control" type="text" name="cursos_id" autocomplete="cursos_id" value="{{isset($desarrollo_curso->cursos_id)?$desarrollo_curso->cursos_id:''}}" required readonly hidden>

                        <input type="submit" class="btn btn-success" value="Modificar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection