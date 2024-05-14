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
                <div class="card-header">Gestión de Pagos</div> 
                <div class="card-body">
                    <div>
                        <a href="{{url('/superadministrador')}}" class="btn btn-danger">Regresar</a>
                    </div>
                    <br>

                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="card-title">Nombre de Usuario</th>
                            <th class="card-title">Nombre de Curso</th>
                            <th class="card-title">Descripción</th>
                            <th class="card-title">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
            
                            <tr> 
                                <td>
                                    <div>
                                        <a class="btn btn-warning" href="{{url('/superadminpagos/'.$curso->id.'/edit')}}">Editar
                                        <br>
                                        <a class="btn btn-primary" href="{{url('/superadminpagos/'.$curso->id)}}">Consultar
                                        </a>
                                    </div>

                                </td>
                                <td>{{$curso->name}}</td>
                                <td>{{$curso->nombre_curso}}</td>
                                <td>{{$curso->descripcion_curso}}</td>
                                @if ($curso->status == "Pendiente")
                                <td style="background-color: rgb(235, 139, 15);">
                                    Pendiente
                                </td>
                                @endif
                                @if ($curso->status == "Pagado")
                                <td style="background-color: rgb(114, 224, 110);">
                                    Pagado
                                </td>
                                @endif
                                @if ($curso->status == "Fallido")
                                <td  style="background-color: rgb(219, 97, 97);">
                                    Fallido
                                </td>
                                @endif
                                @if ($curso->status == "Reembolsado")
                                <td style="background-color: rgb(86, 165, 230);">
                                    Reembolsado
                                </td>
                                @endif
                                @if ($curso->status == "Cancelado")
                                <td style="background-color: rgb(170, 159, 159);">
                                    Cancelado
                                </td>
                                @endif
                                @if ($curso->status == "En proceso")
                                <td style="background-color: rgb(226, 212, 11);">
                                    En proceso
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