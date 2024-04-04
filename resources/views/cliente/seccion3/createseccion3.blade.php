@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion3.js'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 3A</div>
                <div class="card-body">
                    <form action="" id="myForm">
                        
                        @if(session('idCurso'))
                        <label for="">Curso Id</label>
                            <input name="cursos_id" type="number" class="form-control"  id="cursos_id" value={{ session('idCurso') }}  hidden>
                        @else
                        <label for="">Curso Id</label>
                            <input name="cursos_id" type="number" class="form-control"  id="cursos_id" value={{ session('idCurso') }} hidden>
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