@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion3c.js'])

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
    <div class="row">
        <div class="col-md-12">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 3C</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body" >
                            
                            <div class="row">
                                
                                <div class="col-md-8">
                                    
                                    <label for="cursos_id3c">Objetivo Particular:</label>
                                    <select name="selectObjetivoParticular3c" id="selectObjetivoParticular3c" class="form-control">
                                        <option value="0">Escoja un Objetivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    
                                    <label for="temas_id3c">Temas:</label>
                                    <select name="selectTemas" id="selectTemas" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <form action="" id="FormSubtemas">

                                    <div>
                                        <label for="cantidadSubtemas2">Cantidad de Subtemas</label>
                                        <input type="number" name="cantidadSubtemas" id="cantidadSubtemas">
                                    </div>
                                    <div id="divSubtemas">
                                    
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Crear">
                                </form>
                            </div>

            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection