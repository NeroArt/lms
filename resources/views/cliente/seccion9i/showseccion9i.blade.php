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
                <div class="card-header">Gestión de Cierre de Curso - Sección 9I</div>
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
                                    <a class="btn btn-warning" href="{{url('/seccion9i/'.$cierre->id.'/edit')}}">Editar
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
                                        <a class="btn btn-warning" href="{{url('/seccion9iactividad/'.$actividad->id.'/edit')}}">Editar
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