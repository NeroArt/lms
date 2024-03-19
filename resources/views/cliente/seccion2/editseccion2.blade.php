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
                <div class="card-header">Creación de curso - Sección 2</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
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
                                    <input id="descripcion" class="form-control" type="text" name="descripcion" autocomplete="Objetivo General " value="{{isset($objetivo->descripcion)?$objetivo->descripcion:''}}">
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
                                    <input id="accion" class="form-control" type="text" name="accion" autocomplete="Acción" value="{{isset($objetivo->accion)?$objetivo->accion:''}}">
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
                                    <input id="condicion" class="form-control" type="text" name="condicion" autocomplete="Condición" value="{{isset($objetivo->condicion)?$objetivo->condicion:''}}">
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
@vite(['resources/js/menulateral.js'])
@endsection