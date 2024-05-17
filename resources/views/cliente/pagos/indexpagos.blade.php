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
                <div class="card-header">Gestión de Certificaciones</div> 
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
                            <th class="card-title">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $pago)
            
                            <tr> 
                                <td>
                                    <div>
                                        @if ($pago->status == "Pendiente" || $pago->status == "Fallido" || $pago->status == "Reembolsado" || $pago->status == "Cancelado")
                                        <a class="btn btn-success" href="{{url('/pago/update/'.$pago->idpago)}}">Pagar
                                        </a> 
                                        @endif
                                        <br>
                                        <a class="btn btn-primary" href="{{url('/pago/'.$pago->id)}}">Consultar
                                        </a>
                                    </div>

                                </td>
                                
                                <td>{{$pago->nombre_curso}}</td>
                                <td>{{$pago->descripcion_curso}}</td>
                                @if ($pago->status == "Pendiente")
                                <td style="background-color: rgb(235, 139, 15);">
                                    Pendiente
                                </td>
                                @endif
                                @if ($pago->status == "Pagado")
                                <td style="background-color: rgb(114, 224, 110);">
                                    Pagado
                                </td>
                                @endif
                                @if ($pago->status == "Fallido")
                                <td  style="background-color: rgb(219, 97, 97);">
                                    Fallido
                                </td>
                                @endif
                                @if ($pago->status == "Reembolsado")
                                <td style="background-color: rgb(86, 165, 230);">
                                    Reembolsado
                                </td>
                                @endif
                                @if ($pago->status == "Cancelado")
                                <td style="background-color: rgb(170, 159, 159);">
                                    Cancelado
                                </td>
                                @endif
                                @if ($pago->status == "En Proceso")
                                <td style="background-color: rgb(226, 212, 11);">
                                    En Proceso
                                </td>
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                    {{ $pagos->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection