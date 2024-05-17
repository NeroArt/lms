@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Modificacion de curso - Sección 4</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/seccion4/'.$cursos_id)}}" class="btn btn-danger">Regresar</a>
                        </div>
                    </div>
                    
                    <form action="{{url('/seccion4/'.$requerimiento->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        
                        <div class="container mt-5">
                            <div>
                                <h2>Requerimiento:</h2>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="name">Requerimiento</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="requerimientos" class="form-control" type="text" name="requerimientos" autocomplete="Requerimiento" value="{{isset($requerimiento->requerimientos)?$requerimiento->requerimientos:''}}" required>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div> 
                        <input type="submit" class="btn btn-success" value="Modificar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection