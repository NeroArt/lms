@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Modificacion de Actividad - Sección 8C</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion8c/'.$curso_id)}}" class="btn btn-danger">Regresar</a>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion8cactividad/'.$desarrollo_actividad->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Modificación de Actividad - Seccion 8C:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Descripción de la Actividad</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" value="{{isset($desarrollo_actividad->actividad)?$desarrollo_actividad->actividad:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div> 
                        <input id="desarrollo_cursos_id" class="form-control" type="text" name="desarrollo_cursos_id" autocomplete="desarrollo_cursos_id" value="{{isset($desarrollo_actividad->desarrollo_cursos_id )?$desarrollo_actividad->desarrollo_cursos_id :''}}" readonly hidden>
                        
                        <input type="submit" class="btn btn-success" value="Modificar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection