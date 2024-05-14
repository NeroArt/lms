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
                <div class="card-header">Gestión de Transferencias</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        
                        <div class="col">
                            <a href="{{url('/superadministrador')}}" class="btn btn-danger">Regresar</a>
                        </div>
                        <br>
                        <div class="col">
                            <a href="{{url('/transferencia/create')}}" class="btn btn-primary">Crear No. de Cuenta</a>
                        </div>

                    </div>
                    <br>
                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="card-text">Nombre</th>
                            <th class="card-title">No. de Cuenta Bancaria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transferencias as $transferencia)
                            <tr>   
                                <td>
                                <a class="btn btn-warning" href="{{url('/transferencia/'.$transferencia->id.'/edit')}}">
                                 Editar
                                 </a>
                                 </td> 
                                <td>{{$transferencia->nombre_beneficiario}}</td>
                                <td>{{$transferencia->numero_cuenta}}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $transferencias->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection