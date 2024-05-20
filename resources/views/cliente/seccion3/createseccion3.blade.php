@extends('layouts.app')
@vite(['resources/js/seccion3.js'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 3A</div>
                <div class="card-body">
                    <form action="" id="myForm">
                        <div class="form-group">
                            <label >Descripción de Objetivo 1:</label>
                            <input type="text" id="descripcion[0]" class="form-control" required>
                            <label>Sujeto del Objetivo 1:</label>
                            <input type="text" id="sujeto[0]" readonly value="El Participante" required class="form-control">
                            <label>Acción del Objetivo 1:</label>
                            <textarea id="accion[0]" required class="form-control" autocomplete="accion[0]"></textarea>
                            <label>Condición del Objetivo 1:</label>
                            <textarea id="condicion[0]" required class="form-control" autocomplete="condicion[0]"></textarea>
                            <input type="text" id="tipo_objetivo[0]" value="particular" hidden required>
                        </div>
                        <br>
                        <br>
                        <hr class="separador">
                        <div div class="form-group">
                            <label >Descripción de Objetivo 2:</label>
                            <input type="text" id="descripcion[1]" class="form-control" required>
                            <label>Sujeto del Objetivo 2:</label>
                            <input type="text" id="sujeto[1]" readonly value="El Participante" required class="form-control">
                            <label>Acción del Objetivo 2:</label>
                            <textarea id="accion[1]" required class="form-control" autocomplete="accion[1]"></textarea>
                            <label>Condición del Objetivo 2:</label>
                            <textarea id="condicion[1]" required class="form-control" autocomplete="condicion[1]"></textarea>
                            <input type="text" id="tipo_objetivo[1]" value="particular" hidden required>
                        </div>
                        <br>
                        <br>    
                        <hr class="separador">
                        <div div class="form-group">
                            <label >Descripción de Objetivo 3:</label>
                            <input type="text" id="descripcion[2]" class="form-control" required>
                            <label>Sujeto del Objetivo 3:</label>
                            <input type="text" id="sujeto[2]" readonly value="El Participante" required class="form-control">
                            <label>Acción del Objetivo 3:</label>
                            <textarea id="accion[2]" required class="form-control" autocomplete="accion[2]"></textarea>
                            <label>Condición del Objetivo 3:</label>
                            <textarea id="condicion[2]" required class="form-control" autocomplete="condicion[2]"></textarea>
                            <input type="text" id="tipo_objetivo[2]" value="particular" hidden required>
                        </div>
                        <br>
                    <input type="submit" class="btn btn-success" value="Crear">
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection