@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Session::has('Mensaje'))
        <div class="alert alert-warning alert-dismissable"> 
            {{Session::get('Mensaje')}}
        </div>
    @endif
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Gestión de Previo al Inicio del Curso</div>
                <div class="card-body">
                    <div>
                        <a href="{{url('/gestionsecciones/'. $cursoId)}}" class="btn btn-danger">Regresar</a>
                    </div>
                    <br>

                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="card-title">Etapa</th>
                            <th class="card-title">Duración</th>
                            <th class="card-title">Material y Equipo de Apoyo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($previo_inicios as $previo)
            
                            <tr> 
                                <td>
                                    <a class="btn btn-warning" href="{{url('/seccion6/'.$previo->id.'/edit')}}">Editar
                                    </a> 
                                </td>
                                
                                <td>{{$previo->etapa}}</td>
                                <td>{{$previo->duracion}}</td>
                                <td>{{$previo->material_equipo_de_apoyo}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $previo_inicios->links() }}
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" >
                        <thead class="thead-dark" >
                            <tr>
                                <th class="card-title">Acción</th>
                                <th class="card-title">Actividad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($previo_inicios_actividades as $actividad)
                
                                <tr> 
                                    <td>
                                        <a class="btn btn-warning" href="{{url('/seccion6actividad/'.$actividad->id.'/edit')}}">Editar
                                        </a> 
                                    </td>
                                    
                                    <td>{{$actividad->actividad}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="pagination">
                        {{ $previo_inicios_actividades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection