@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion5.js'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 5</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body" >
                            <input type="text" id="requerimientos_id" name="requerimientos_id" hidden>
                            <div class="row">
                                
                                <div class="col-md-8">
                                    
                                    <label for="cursos_id3d">Momento de aplicación:</label>
                                    <select name="selectRequerimiento" id="selectRequerimiento" class="form-control">
                                        <option value="0">Escoja un momento de aplicación:</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <form action="" id="myForm">
                                    <div id="divRequerimientos">
                                    
                                    </div>
                                    <button type="submit">Guardar</button>
                                </form>
                            </div>
                            <a href="{{url('/seccion6/create')}}" class="btn btn-success">Siguiente</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection