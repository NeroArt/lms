@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion3b.js'])

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
                <div class="card-header">Creación de curso - Sección 3b</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body" >
                            <input type="text" id="objetivos_id" name="objetivos_id">
                            <div class="row">
                                
                                <div class="col-md-8">
                                    
                                    <label for="cursos_id3b">Objetivo Particular:</label>
                                    <select name="selectObjetivoParticular" id="selectObjetivoParticular" class="form-control">
                                        <option value="0">Escoja un Objetivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                
                                <span class="text-negrita">Objetivo: <p id="dataobjetivo"></p></span> 
                                </div>
                                <div class="col-md-4">
                                <span class="text-negrita">Acción: <p id="dataaccion"></p></span> 
                                </div>
                                <div class="col-md-4">
                                <span class="text-negrita">Condición: <p id="datacondicion"></p></span>  
                                </div>
                            </div>
                            <div class="row">
                                <form action="" id="myForm">

                                    <div>
                                        <label for="">Cantidad de Temas</label>
                                        <input type="number" name="cantidadTemas" id="cantidadTemas">
                                    </div>
                                    <div id="divTemas">
                                    
                                    </div>
                                    <button type="submit">Guardar</button>
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