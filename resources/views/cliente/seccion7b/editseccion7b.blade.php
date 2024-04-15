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
                <div class="card-header">Modificacion de curso - Sección 7B</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion7b/'.$inicio_curso->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Modificación de Apertura del Curso - Seccion 7B:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Descripción</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" value="{{isset($inicio_curso->etapa_encuadre)?$inicio_curso->etapa_encuadre:''}}">
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
@vite(['resources/js/menulateral.js'])
@endsection