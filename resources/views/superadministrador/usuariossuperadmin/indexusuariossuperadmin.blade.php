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
                    <div class="row justify-content-center">
                        
                        <div class="col">
                            <a href="{{url('/superadministrador')}}" class="btn btn-danger">Regresar</a>
                        </div>
                        <br>
                        <div class="col">
                            <a href="{{url('/usuariossuperadmin/create')}}" class="btn btn-primary">Crear Usuario</a>
                        </div>

                    </div>
                    <br>
                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="card-text">Nombre</th>
                            <th class="card-title">Email</th>
                            <th class="card-title">Rol</th>
                            <th class="card-title">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
            
                            <tr>    
                                <td>
                               @if ($usuario->roles_id !== 3)
                               <a class="btn btn-warning" href="{{url('/usuariossuperadmin/'.$usuario->id.'/edit')}}">
                                Editar
                                </a>
                                @endif

                         

                            </td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->descripcion}}</td>
                                @if ($usuario->status == 1)
                                    <td style="background-color: rgb(114, 224, 110);">
                                        Activo
                                    </td>
                                @endif
                                @if ($usuario->status == 0)
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
                    {{ $usuarios->links() }}
                </div>
           
        
   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection