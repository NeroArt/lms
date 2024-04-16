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
                <div class="card-header">Gestión de Secciones de Curso</div>
                <div class="card-body">
                    <div>
                        <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
                    </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" >
                        <thead class="thead-dark" >
                            <tr>
                                <th class="card-title">Acción</th>
                                <th class="card-title">Actividad</th>
                                <th class="card-title">Curso</th>
                                <th class="card-title">Técnicas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seguimientos as $campo)
                
                                <tr> 
                                    <td>
                                        <a class="btn btn-warning" href="{{url('/seccion7cactividad/'.$campo->id.'/edit')}}">Editar
                                        </a> 
                                    </td>
                                    <td>{{$campo->actividad}}</td>
                                    <td>{{$campo->nombre_curso}}</td>
                                    @if ($campo->status == 1)
                                    <td style="background-color: rgb(114, 224, 110);">
                                        Activo
                                    </td>
                                    @endif
                                     @if ($campo->status == 0)
                                    <td width="50%" style="background-color: rgb(219, 97,   97);">
                                        Inactivo
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="pagination">
                        {{ $seguimientos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection