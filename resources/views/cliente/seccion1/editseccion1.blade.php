@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')
<div id="mySidenav" class="sidenav row container">
	<div class="mySidenavContainer">
		<div class="col-md-2"><a id="closeSidenav" href="javascript:void(0)" class="closebtn">&#9776;Cerrar</a></div>
		<div class="col-md-2"><a href="{{url('/seccion2')}}">Sección 2</a></div>
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
                <div class="card-header">Modificar Curso - Sección 1</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion1')}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion1/'.$curso->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <!-- Nombre del curso -->
                        <div class="container mt-5">
                            <div>
                                <h2>Nombre del curso/Sesión:</h2>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Nombre del curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_curso" class="form-control" type="text" name="nombre_curso" autocomplete="Nombre del curso" value="{{isset($curso->nombre_curso)?$curso->nombre_curso:''}}">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Descripción del curso -->
                        <div class="container mt-5">
                            <div>
                                <h2>Descripción del Curso:</h2>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Descripción del curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="descripcion_curso" class="form-control" type="text" name="descripcion_curso" autocomplete="Descripción del Curso" value="{{isset($curso->descripcion_curso)?$curso->descripcion_curso:''}}">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <!-- Nombre del diseñador -->
                        <div class="container mt-5">
                            <div>
                                <h2>Nombre del Diseñador:</h2>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Nombre de Diseñador</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_disenador" class="form-control" type="text" name="nombre_disenador" autocomplete="Nombre de Diseñador" value="{{isset($curso->nombre_disenador)?$curso->nombre_disenador:''}}">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Nombre del Facilitador -->
                        <div class="container mt-5">
                            <div>
                                <h2>Nombre del Facilitador/ Instructor/capacitador/formador:</h2>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Nombre de Diseñador</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_facilitador" class="form-control" type="text" name="nombre_facilitador" autocomplete="Nombre de Facilitador" value="{{isset($curso->nombre_facilitador)?$curso->nombre_facilitador:''}}">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <!-- Lugar de instruccion -->
                        <div class="container mt-5">
                            <div>
                                <h2>Lugar de Instrucción:</h2>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Lugar de Instrucción</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="lugar_instruccion" class="form-control" type="text" name="lugar_instruccion" autocomplete="Lugar de Instrucción" value="{{isset($curso->lugar_instruccion)?$curso->lugar_instruccion:''}}">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Duración -->
                        <div class="container mt-5">
                            <div>
                                <h2>Duración:</h2>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">El curso debe durar aproximadamente dos horas</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Duración</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="duracion" class="form-control" type="text" name="duracion"  autocomplete="Lugar de Instrucción" value="{{isset($curso->duracion)?$curso->duracion:''}}">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Fecha -->
                        <div class="container mt-5">
                            <div>
                                <h2>Fecha(s):</h2>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <p class="card-text">Fecha cuando se realizara el curso.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Fecha de curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="fechas" class="form-control" type="date" name="fechas" autocomplete="Lugar de Instrucción" value="{{isset($curso->fechas)?$curso->fechas:''}}">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>


                        <!-- Perfil de participante-->
                        <div class="container mt-5">
                            <div>
                                <h2>Perfil de Participante:</h2>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">Perfil del participante</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNombre" class="form-label">Perfil del participante:</label>
                            <input type="text" name="perfil_participante" class="form-control" id="perfil_participante" value="{{isset($curso->perfil_participante)?$curso->perfil_participante:''}}">
                            <br>
                            <label for="exampleInputNombre" class="form-label">Conocimientos:</label>
                            <input type="text" name="perfil_participante_conocimientos" class="form-control" id="perfil_participante_conocimientos" value="{{isset($curso->perfil_participante_conocimientos)?$curso->perfil_participante_conocimientos:''}}">
                            <br>
                            <label for="exampleInputNombre" class="form-label">Habilidades/Desempeños:</label>
                            <input type="text" name="perfil_participante_habilidades" class="form-control" id="perfil_participante_habilidades" value="{{isset($curso->perfil_participante_habilidades)?$curso->perfil_participante_habilidades:''}}">
                            <br>
                            <label for="exampleInputNombre" class="form-label">Producto:</label>
                            <input type="text" name="perfil_participante_producto" class="form-control" id="perfil_participante_producto" value="{{isset($curso->perfil_participante_producto)?$curso->perfil_participante_producto:''}}">
                            <br>
                            <label for="exampleInputNombre" class="form-label">AHV:</label>
                            <input type="text" name="perfil_participante_ahv" class="form-control" id="perfil_participante_ahv" value="{{isset($curso->perfil_participante_ahv)?$curso->perfil_participante_ahv:''}}">
                            <br>
                            <label for="exampleInputNombre" class="form-label">Número de participantes:</label>
                            <input type="number" name="no_participantes" class="form-control" id="no_participantes" value="{{isset($curso->no_participantes)?$curso->no_participantes:''}}">
                            <input name="users_id" type="no_participantes" class="form-control" id="users_id" value="{{isset($curso->users_id)?$curso->users_id:''}}" disabled hidden>
                        </div>

                        <div class="mb-3">
                            <div class="name ">Beneficios del curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="beneficios_del_curso" class="form-control" type="text" name="beneficios_del_curso" autocomplete="Lugar de Instrucción" value="{{isset($curso->beneficios_del_curso)?$curso->beneficios_del_curso:''}}">
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