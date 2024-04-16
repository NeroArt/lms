@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 1</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion1')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        
                        <!-- Nombre del curso -->
                        <div class="container mt-5">
                            <div>
                                <h2>Nombre del curso/Sesión:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name ">Nombre del curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_curso" class="form-control" type="text" name="nombre_curso" autocomplete="Nombre del curso">
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
                                    <input id="descripcion_curso" class="form-control" type="text" name="descripcion_curso" autocomplete="Descripción del Curso">
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
                                    <input id="nombre_disenador" class="form-control" type="text" name="nombre_disenador" autocomplete="Nombre de Diseñador">
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
                                    <input id="nombre_facilitador" class="form-control" type="text" name="nombre_facilitador" autocomplete="Nombre de Facilitador">
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
                                    <input id="lugar_instruccion" class="form-control" type="text" name="lugar_instruccion" autocomplete="Lugar de Instrucción">
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
                                    <input id="duracion" class="form-control" type="text" name="duracion"  autocomplete="Lugar de Instrucción">
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
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">Fecha cuando se realizara el curso.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Fecha de curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="fechas" class="form-control" type="date" name="fechas" autocomplete="Lugar de Instrucción">
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

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNombre" class="form-label">Perfil del participante:</label>
                            <input type="text" name="perfil_participante" class="form-control" id="perfil_participante">
                            <br>
                            <label for="exampleInputNombre" class="form-label">Conocimientos:</label>
                            <input type="text" name="perfil_participante_conocimientos" class="form-control" id="perfil_participante_conocimientos">
                            <br>
                            <label for="exampleInputNombre" class="form-label">Habilidades/Desempeños:</label>
                            <input type="text" name="perfil_participante_habilidades" class="form-control" id="perfil_participante_habilidades">
                            <br>
                            <label for="exampleInputNombre" class="form-label">Producto:</label>
                            <input type="text" name="perfil_participante_producto" class="form-control" id="perfil_participante_producto">
                            <br>
                            <label for="exampleInputNombre" class="form-label">AHV:</label>
                            <input type="text" name="perfil_participante_ahv" class="form-control" id="perfil_participante_ahv">
                            <br>
                            <label for="exampleInputNombre" class="form-label">Número de participantes:</label>
                            <input type="number" name="no_participantes" class="form-control" id="no_participantes">
                            <input name="users_id" type="number" class="form-control" id="users_id" value={{ Auth::user()->id }} hidden>

                        </div>

                        <!-- Beneficios del Curso -->
                        <div class="container mt-5">
                            <div>
                                <h2>Beneficios del Curso:</h2>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">Que beneficios traera el curso.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Beneficios del curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="beneficios_del_curso" class="form-control" type="text" name="beneficios_del_curso" autocomplete="Beneficios del curso">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
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