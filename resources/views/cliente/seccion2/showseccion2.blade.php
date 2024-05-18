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
                <div class="card-header">Gestión de Objetivo General</div>
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
                            <th class="card-title">Tipo de Objetivo</th>
                            <th class="card-title">Descripción</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($objetivos as $objetivo)
            
                            <tr> 
                                <td>
                                    <a class="btn btn-warning" href="{{url('/seccion2/'.$objetivo->id.'/edit')}}">Editar
                                    </a> 
                                </td>
                                
                                <td>{{$objetivo->tipo_objetivo}}</td>
                                <td>{{$objetivo->descripcion}}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $objetivos->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection