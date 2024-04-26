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
                <div class="card-header">Gestión de Cierre de Curso - Sección 9F</div>
                <div class="card-body">
                    <div>
                        <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
                    </div>
                    <br>

                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="card-title">Descripción</th>
                            <th class="card-title">Duración</th>
                            <th class="card-title">Técnicas</th>
                            <th class="card-title">Material y Equipo de Apoyo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cierre_cursos as $cierre)
            
                            <tr> 
                                <td>
                                    <a class="btn btn-warning" href="{{url('/seccion9f/'.$cierre->id.'/edit')}}">Editar
                                    </a> 
                                </td>
                                
                                <td>{{$cierre->etapa_encuadre}}</td>
                                <td>{{$cierre->duracion}}</td>
                                <td>{{$cierre->tecnicas}}</td>
                                <td>{{$cierre->material_equipo_apoyo}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $cierre_cursos->links() }}
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
                            @foreach ($cierre_actividades as $actividad)
                
                                <tr> 
                                    <td>
                                        <a class="btn btn-warning" href="{{url('/seccion9factividad/'.$actividad->id.'/edit')}}">Editar
                                        </a> 
                                    </td>
                                    <td>{{$actividad->actividad}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="pagination">
                        {{ $cierre_actividades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection