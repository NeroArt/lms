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
                <div class="card-header">Gestión de Evaluaciones</div>
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
                            <th class="card-title">Aspecto a evaluar</th>
                            <th class="card-title">Porcentaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluaciones as $evaluacion)
            
                            <tr> 
                                <td>
                                    <a class="btn btn-warning" href="{{url('/seccion5/'.$evaluacion->id.'/edit')}}">Editar
                                    </a> 
                                </td>
                                
                                <td>{{$evaluacion->aspecto}}</td>
                                <td>{{$evaluacion->porcentaje}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $evaluaciones->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection