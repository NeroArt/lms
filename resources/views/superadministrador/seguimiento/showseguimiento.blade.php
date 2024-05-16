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
                <div class="card-header">Seguimiento de curso {{$nombreCurso}}</div> 
                <div class="card-body">
                    <div>
                        <a href="{{url('/seguimientosuperadmin')}}" class="btn btn-danger">Regresar</a>
                    </div>
                    <br>

                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Sección</th>
                            <th class="card-title">Porcentaje</th>
                            <th class="card-title">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($avances as $avance)
            
                            <tr> 

                                <td>{{$avance->seccion}}</td>
                                <td>{{$avance->porcentaje_seccion}}%</td>
                                @if ($avance->status == 1)
                                <td style="background-color: rgb(114, 224, 110);">
                                    Completo
                                </td>
                                @endif
                                @if ($avance->status == 0)
                                <td  style="background-color: rgb(219, 97, 97);">
                                    Incompleto
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection