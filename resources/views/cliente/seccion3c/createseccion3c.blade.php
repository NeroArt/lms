@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion3c.js'])

@section('content')
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
                                    <select name="selectTemas" id="selectTemas" class="form-control" >
                                        <option value="0">Escoja un Objetivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <form action="" id="FormSubtemas" class="espacio-superior">
                                        <div>
                                            <label for="cantidadSubtemas2">Cantidad de Subtemas</label>
                                            <input type="number" name="cantidadSubtemas" id="cantidadSubtemas" class="form-control" required>
                                        </div>
                                        <div id="divSubtemas">
                                        </div>
                                        <input type="submit" class="btn btn-success espacio-superior" value="Crear">
                                    </form>
                                </div>
                            </div>
                            <a href="{{url('/seccion3d/create')}}" class="btn btn-primary espacio-superior">Siguiente</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection