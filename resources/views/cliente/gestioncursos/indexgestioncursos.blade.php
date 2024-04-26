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
                <div class="card-header">Gestión de Cursos</div> 
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
                            <th class="card-title">Nombre de Curso</th>
                            <th class="card-title">Descripción</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
            
                            <tr> 
                                <td>
                                    <div class="btn">
                                        <a class="btn btn-warning" href="{{url('/gestionsecciones/'.$curso->id)}}">Editar
                                        </a> 
                                        <br>
                                        <a class="btn btn-primary" href="{{url('/plantilla_cliente/'.$curso->id)}}">Template
                                        </a>
                                    </div>

                                </td>
                                
                                <td>{{$curso->nombre_curso}}</td>
                                <td>{{$curso->descripcion_curso}}</td>
                                
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