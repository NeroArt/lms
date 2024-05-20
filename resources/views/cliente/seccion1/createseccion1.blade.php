@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion1.js'])
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
                            
                        </div>
                    </div>
                    <br>
                    <form action="{{url('/seccion1')}}" method="POST" enctype="multipart/form-data" id="myForm">
                        {{csrf_field()}}
                        
                        <!-- Nombre del curso -->
                        <div class="mb-3">
                            <div class="name ">Nombre del curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_curso" class="form-control" type="text" name="nombre_curso" autocomplete="Nombre del curso" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Descripción del curso -->
                        <div class="mb-3">
                            <div class="name ">Descripción del curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <textarea id="descripcion_curso" class="form-control" type="text" name="descripcion_curso" autocomplete="Descripción del Curso" required></textarea>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <!-- Nombre del diseñador -->
                        <div class="mb-3">
                            <div class="name ">Nombre de Diseñador</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_disenador" class="form-control" type="text" name="nombre_disenador" autocomplete="Nombre de Diseñador" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Nombre del Facilitador -->
                        <div class="mb-3">
                            <div class="name ">Nombre de Facilitador</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_facilitador" class="form-control" type="text" name="nombre_facilitador" autocomplete="Nombre de Facilitador" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <!-- Lugar de instruccion -->
                        <div class="mb-3">
                            <div class="name ">Lugar de Instrucción</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="lugar_instruccion" class="form-control" type="text" name="lugar_instruccion" autocomplete="Lugar de Instrucción" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Duración -->
                        <div class="mb-3">
                            <div class="name ">Duración</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="duracion" class="form-control" type="text" name="duracion"  autocomplete="Lugar de Instrucción" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <div class="name ">Fecha de curso (Cuando se realizara el curso)</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="fechas" class="form-control" type="date" name="fechas" autocomplete="Lugar de Instrucción" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputNombre" class="form-label">Perfil del participante:</label>
                            <textarea name="perfil_participante" id="perfil_participante"  required autocomplete="perfil_participante" type="text"  class="form-control"></textarea>
                            <br>
                            <label for="exampleInputNombre" class="form-label">Conocimientos:</label>
                            <textarea name="perfil_participante_conocimientos" id="perfil_participante_conocimientos"  required autocomplete="perfil_participante_conocimientos" type="text"  class="form-control"></textarea>
                            <br>
                            <label for="exampleInputNombre" class="form-label">Habilidades/Desempeños:</label>
                            <input type="text" name="perfil_participante_habilidades" class="form-control" id="perfil_participante_habilidades" required>
                            <br>
                            <label for="exampleInputNombre" class="form-label">Producto:</label>
                            <input type="text" name="perfil_participante_producto" class="form-control" id="perfil_participante_producto" required>
                            <br>
                            <label for="exampleInputNombre" class="form-label">AHV:</label>
                            <input type="text" name="perfil_participante_ahv" class="form-control" id="perfil_participante_ahv" required>
                            <br>
                            <label for="exampleInputNombre" class="form-label">Número de participantes:</label>
                            <input type="number" name="no_participantes" class="form-control" id="no_participantes" required>
                            <input name="users_id" type="number" class="form-control" id="users_id" value={{ Auth::user()->id }} hidden>

                        </div>

                        <!-- Beneficios del Curso -->
                        <div class="mb-3">
                            <div class="name ">Beneficios del curso</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <textarea name="beneficios_del_curso" id="beneficios_del_curso" required autocomplete="Beneficios del curso" type="text"  class="form-control"></textarea>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <input type="submit" class="btn btn-success" id="save1" value="Crear">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection