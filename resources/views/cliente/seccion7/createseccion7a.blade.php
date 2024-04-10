@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion7a.js'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 7 A</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body" >
                            <div class="row">
                                <form action="" id="myForm">
                                    <div class="mb-3">
                                        <div class="name">Descripción de Etapa de Encuadre</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <textarea id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="">Cantidad de Actividades</label>
                                        <input type="number" name="cantidadRequerimientos" id="cantidadRequerimientos">
                                    </div>

                                    <div id="divRequerimientos">
                                    
                                    </div>
                                    <button type="submit">Guardar</button>
                                </form>
                            </div>
                            <a href="{{url('/seccion7/create')}}" class="btn btn-success">Siguiente</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection