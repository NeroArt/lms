@extends('layouts.app')
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
                                    <form action="" id="myForm">

                                        <div id="divBeneficios">
                                        
                                        </div>
                                        <button class="btn btn-success espacio-superior" type="submit">Guardar</button>
                                    </form>
                                </div>                                    
                            </div>
                            <a href="{{url('/seccion4/create')}}" class="btn btn-primary">Siguiente</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection