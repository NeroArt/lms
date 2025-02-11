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
                <div class="card-header">Gestión de Apertura o Encuadre de Curso - Sección 7A</div>
                <div class="card-body">
                    @if (Auth::user()->roles_id == 1)
                    <div>
                        <a href="{{url('/gestionseccionesadmin/'. $cursoId)}}" class="btn btn-danger">Regresar</a>
                    </div>
                    @endif
                    @if (Auth::user()->roles_id == 2)
                    <div>
                        <a href="{{url('/gestionsecciones/'. $cursoId)}}" class="btn btn-danger">Regresar</a>
                    </div>
                    @endif
                    @if (Auth::user()->roles_id == 3)
                    <div>
                        <a href="{{url('/gestionseccionessuperadmin/'. $cursoId)}}" class="btn btn-danger">Regresar</a>
                    </div>
                    @endif
                    <br>

                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="card-title">Etapa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inicio_cursos as $inicio)
            
                            <tr> 
                                <td>
                                    <a class="btn btn-warning" href="{{url('/seccion7a/'.$inicio->id.'/edit')}}">Editar
                                    </a> 
                                </td>
                                
                                <td>{{$inicio->etapa_encuadre}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $inicio_cursos->links() }}
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" >
                        <thead class="thead-dark" >
                            <tr>
                                <th class="card-title">Acción</th>
                                <th class="card-title">Actividad</th>
                                <th class="card-title">Duración</th>
                                <th class="card-title">Tecnicas</th>
                                <th class="card-title">Material y Equipo de Apoyo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inicio_actividades as $actividad)
                
                                <tr> 
                                    <td>
                                        <a class="btn btn-warning" href="{{url('/seccion7actividad/'.$actividad->id.'/edit')}}">Editar
                                        </a> 
                                    </td>
                                    
                                    <td>{{$actividad->actividad}}</td>
                                    <td>{{$actividad->duracion}}</td>
                                    <td>{{$actividad->tecnicas}}</td>
                                    <td>{{$actividad->material_equipo_apoyo}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="pagination">
                        {{ $inicio_actividades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection