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
    <div class="row >
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 3.1</div>
                <div class="card-body">
                    <form action="" id="myForm">
                        
                        @if(session('idCurso'))
                            <input name="cursos_id" type="number" class="form-control"  id="cursos_id" value={{ session('idCurso') }} >
                        @else
                            <input name="cursos_id" type="number" class="form-control"  id="cursos_id" value={{ session('idCurso') }} >
                        @endif
                        <div>
                            <label for="">Cantidad Objetivos Particulares</label>
                            <input type="number" name="quantity" id="quantity">
                        </div>
                        <div id="divGuests">
                        
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark" >
                                    <tr>
                                        <th class="card-title">Sujeto</th>
                                        <th class="card-title">Acción</th>
                                        <th class="card-title">Condición</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="divObjetivos">
                                    
                                </tbody>
                            </table>
                        </div>

                        <input type="submit" class="btn btn-success" value="Crear">
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection