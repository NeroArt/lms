@extends('layouts.app')
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Pago de Curso</div>
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
                        <div class="name ">Número de Cuenta</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input id="nombre_curso" class="form-control" type="text" name="nombre_curso" autocomplete="Nombre del curso" value="{{isset($transferencia->numero_cuenta)?$transferencia->numero_cuenta:''}}" required readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <div class="mb-3">
                        <div class="name ">Nombre del Beneficiario</div>
                            <div class="input-group wrap-input100 validate-input" >
                                <input id="nombre_curso" class="form-control" type="text" name="nombre_curso" autocomplete="Nombre del curso" value="{{isset($transferencia->nombre_beneficiario)?$transferencia->nombre_beneficiario:''}}" required readonly>
                                <span class="focus-input100 "></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                            </div>
                    </div>
                    <form action="{{url('/pago/'.$pago->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="mb-3">
                            <div class="name ">Monto a pagar:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="monto_pago" class="form-control" type="number" name="monto_pago" autocomplete="monto_pago" value="500" required readonly>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Concepto de pago:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="concepto_pago" class="form-control" type="text" name="concepto_pago" autocomplete="concepto_pago" value="Certificación de Curso" required readonly>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Metodo de pago:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="metodo_pago" class="form-control" type="text" name="metodo_pago" autocomplete="metodo_pago" value="Transferencia Bancaria" required readonly>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        
                  
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="cursos_id" class="form-control" type="text" name="cursos_id" autocomplete="cursos_id" value="{{isset($curso->id)?$curso->id:''}}" required readonly>
                                </div>
                                <input type="submit" class="btn btn-success" value="Aceptar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@vite([ 'resources/css/modal.css'])
@endsection