@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion3d.js'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 3D</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body" >
                            <label for="">Objetivo Particular Id</label>
                            <input type="text" id="objetivos_id" name="objetivos_id">
                            <div class="row">
                                
                                <div class="col-md-8">
                                    
                                    <label for="cursos_id3d">Objetivo Particular:</label>
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
                                        <label for="">Cantidad de Beneficios</label>
                                        <input type="number" name="cantidadBeneficios" id="cantidadBeneficios">
                                    </div>
                                    <div id="divBeneficios">
                                    
                                    </div>
                                    <button type="submit">Guardar</button>
                                </form>
                            </div>
                            <a href="{{url('/seccion4/create')}}" class="btn btn-success">Siguiente</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection