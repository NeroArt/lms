@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Session::has('Mensaje'))
        <div class="alert alert-warning alert-dismissable"> 
            {{Session::get('Mensaje')}}
        </div>
    @endif
        <div class="col-md-12">
            <div class="card card-5">
                <div class="card-header">Cursos Registrados</div>
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
                            <th class="card-title">Nombre del Cliente</th>
                            <th class="card-title">Nombre de Curso</th>
                            <th class="card-title">Descripción</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
            
                            <tr> 
                                <td>
                                    <div class="btn">
                                        <a class="btn btn-primary" href="{{url('/cursosadministrador/'.$curso->id)}}">Consultar avances
                                        </a> 
                                    </div>
                                    <div class="btn">
                                        <a class="btn btn-warning" href="{{url('/gestionseccionesadmin/'.$curso->id)}}">Editar
                                        </a>
                                    </div>
                                    <div class="btn">
                                        <a class="btn btn-success" href="{{url('/plantilla_cliente/'.$curso->id)}}">Plantilla
                                        </a> 
                                    </div>

                                    <br>

                                </td>
                                
                                <td>{{$curso->name}}</td>
                                <td>{{$curso->nombre_curso}}</td>
                                <td>{{$curso->descripcion_curso}}</td>
                                <td>{{$curso->porcentaje_avance}}%</td>
                                @if ($curso->porcentaje_avance >= 100)
                                <td style="background-color: rgb(114, 224, 110);">
                                    Completo
                                </td>
                                @endif
                                @if ($curso->porcentaje_avance <= 99)
                                <td  style="background-color: rgb(219, 97, 97);">
                                    Incompleto
                                </td>
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $cursos->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection