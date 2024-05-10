@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Modificacion de Actividad - Sección 9A</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion9a/'.$curso_id)}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion9bactividad/'.$cierre_actividad->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Modificación de Actividad - Seccion 9B:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Descripción de la Actividad</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" value="{{isset($cierre_actividad->actividad)?$cierre_actividad->actividad:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div> 
                        <input id="cierre_cursos_id" class="form-control" type="text" name="cierre_cursos_id" autocomplete="cierre_cursos_id" value="{{isset($cierre_actividad->cierre_cursos_id )?$cierre_actividad->cierre_cursos_id :''}}" readonly hidden>
                        
                        <input type="submit" class="btn btn-success" value="Modificar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection