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
                <div class="card-header">Gestión de Requerimientos</div>
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
                            <th class="card-title">Tipo de Requerimiento</th>
                            <th class="card-title">Requerimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requerimientos as $requerimiento)
            
                            <tr> 
                                <td>
                                    <a class="btn btn-warning" href="{{url('/seccion4/'.$requerimiento->id.'/edit')}}">Editar
                                    </a> 
                                </td>
                                
                                <td>{{$requerimiento->descripcion}}</td>
                                <td>{{$requerimiento->requerimientos}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $requerimientos->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection