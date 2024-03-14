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
                <div class="card-header">Gestión de Usuarios</div>
                <div class="card-body">
                    <div>
                        <a href="{{url('/superadministrador')}}" class="btn btn-danger">Regresar</a>
                    </div>
                    <br>
                    <div>
                        <a href="{{url('/actividades/create')}}" class="btn btn-primary">Crear Actividad</a>
                    </div>
                    <br>
                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="card-text">Actividad</th>
                            <th class="card-title">Porcentaje</th>
                            <th class="card-title">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actividades as $actividad)
            
                            <tr> 
                                <td>
                                    <a class="btn btn-warning" href="{{url('/formusuarioadmin/'.$actividad->id.'/edit')}}">Editar
                                    </a> 
                                </td>
                                
                                <td>{{$actividad->actividad}}</td>
                                <td>{{$actividad->porcentaje_actividad}}</td>
                                @if ($actividad->status == 1)
                                    <td style="background-color: rgb(114, 224, 110);">
                                        Activo
                                    </td>
                                @endif
                                @if ($actividad->status == 0)
                                    <td width="50%" style="background-color: rgb(219, 97, 97);">
                                        Inactivo
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $actividades->links() }}
                </div>
           
        
   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection