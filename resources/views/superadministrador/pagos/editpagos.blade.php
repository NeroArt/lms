@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Editar Pagos</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        
                        <div class="col">
                            <a href="{{url('/superadminpagos')}}" class="btn btn-danger">Regresar</a>
                        </div>
                    </div>
                    <br>
                        <label>Nombre de Curso:</label>
                        <label value="">{{isset($curso->nombre_curso)?$curso->nombre_curso:''}}</label>
                        <br>
                    <form action="{{url('/superadminpagos/'.$pago->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="mb-3">
                            <div class="name ">Id de transacción:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="id_transaccion" class="form-control" type="text" name="id_transaccion" value="{{isset($pago->id_transaccion)?$pago->id_transaccion:''}}" required autofocus autocomplete="id_transaccion">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="name ">Seleccionar Status de pago:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <select name="status" id="status" class="form-control" required autofocus autocomplete="status" >
                                        @if ($pago->status == "Pendiente")
                                        <option value="Pendiente" style="background-color: rgb(215, 235, 35);">Actual: Pendiente</option>
                                        @endif
                                        @if ($pago->status == "Pagado")
                                        <option value="Pagado" style="background-color: rgb(215, 235, 35);">Actual: Pagado</option>
                                        @endif
                                        @if ($pago->status == "Fallido")
                                        <option value="Fallido" style="background-color: rgb(215, 235, 35);">Actual: Fallido</option>
                                        @endif
                                        @if ($pago->status == "Reembolsado")
                                        <option value="Reembolsado" style="background-color: rgb(215, 235, 35);">Actual: Reembolsado</option>
                                        @endif
                                        @if ($pago->status == "Cancelado")
                                        <option value="Cancelado" style="background-color: rgb(215, 235, 35);">Actual: Cancelado</option>
                                        @endif
                                        @if ($pago->status == "En Proceso")
                                        <option value="En Proceso" style="background-color: rgb(215, 235, 35);">Actual: En proceso</option>
                                        @endif
                                        <option value="Pendiente" >Pendiente</option>
                                        <option value="Pagado" >Pagado</option>
                                        <option value="Fallido" >Fallido</option>
                                        <option value="Reembolsado" >Reembolsado</option>
                                        <option value="Cancelado" >Cancelado</option>
                                        <option value="En Proceso" >En Proceso</option>
                                    </select>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
             
                        <div class="mb-3">
                            <label >Fecha de pago:</label>
                            <label > {{isset($pago->fecha_pago)?$pago->fecha_pago:''}}</label>
                        </div>
            
                        <div class="mb-3">
                            <div class="name ">Monto de pago:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="monto_pago" class="form-control" type="number" name="monto_pago" value="{{isset($pago->monto_pago)?$pago->monto_pago:''}}" required autofocus autocomplete="monto_pago">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Concepto de pago:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="concepto_pago" class="form-control" type="text" name="concepto_pago" value="{{isset($pago->concepto_pago)?$pago->concepto_pago:''}}" required autofocus autocomplete="concepto_pago">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Metódo de pago:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="metodo_pago" class="form-control" type="text" name="metodo_pago" value="{{isset($pago->metodo_pago)?$pago->metodo_pago:''}}" required autofocus autocomplete="metodo_pago">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                   
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="cursos_id" class="form-control" type="text" name="cursos_id" value="{{isset($pago->cursos_id)?$pago->cursos_id:''}}" readonly hidden>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Nombre de Usuario:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_usuario" class="form-control" type="text" name="nombre_usuario" value="{{isset($pago->nombre_usuario)?$pago->nombre_usuario:''}}" required autofocus autocomplete="nombre_usuario">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Email de Usuario:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="email_usuario" class="form-control" type="text" name="email_usuario" value="{{isset($pago->email_usuario)?$pago->email_usuario:''}}" required autofocus autocomplete="email_usuario">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Modificar">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection