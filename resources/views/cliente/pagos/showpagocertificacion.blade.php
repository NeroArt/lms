@extends('layouts.app')
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Consulta de Pago</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{url('/pagos')}}" class="btn btn-danger">Regresar</a>
                            <span id="mySIdenavIcon">&#9776; Secciones</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Nombre del curso</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input id="nombre_curso" class="form-control" type="text" name="nombre_curso" autocomplete="Nombre del curso" value="{{isset($curso->nombre_curso)?$curso->nombre_curso:''}}" required readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Id de transacción:</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input class="form-control" value="{{isset($pago->id_transaccion)?$pago->id_transaccion:''}}" readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Status:</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input class="form-control" value="{{isset($pago->status)?$pago->status:''}}" readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Fecha de pago:</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input class="form-control" value="{{isset($pago->fecha_pago)?$pago->fecha_pago:''}}" readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Monto de pago:</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input class="form-control" value="{{isset($pago->monto_pago)?$pago->monto_pago:''}}" readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Concepto de pago:</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input class="form-control" value="{{isset($pago->concepto_pago)?$pago->concepto_pago:''}}" readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Método de pago:</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input class="form-control" value="{{isset($pago->metodo_pago)?$pago->metodo_pago:''}}" readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Nombre de Usuario:</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input class="form-control" value="{{isset($pago->nombre_usuario)?$pago->nombre_usuario:''}}" readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Email de Usuario:</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input class="form-control" value="{{isset($pago->email_usuario)?$pago->email_usuario:''}}" readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@vite([ 'resources/css/modal.css'])
@endsection