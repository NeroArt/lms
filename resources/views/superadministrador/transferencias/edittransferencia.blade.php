@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/password_toggle.js'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Editar No. de Cuentas</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        
                        <div class="col">
                            <a href="{{url('/transferencia')}}" class="btn btn-danger">Regresar</a>
                        </div>
                    </div>
                    <br>
                    <form action="{{url('/transferencia/'.$transferencia->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="mb-3">
                            <div class="name ">Nombre de Beneficiario:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="nombre_beneficiario" class="form-control" type="text" name="nombre_beneficiario" value="{{isset($transferencia->nombre_beneficiario)?$transferencia->nombre_beneficiario:''}}" required autofocus autocomplete="nombre_beneficiario">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Número de Cuenta del Beneficiario:</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="numero_cuenta" class="form-control" type="text" name="numero_cuenta" value="{{isset($transferencia->numero_cuenta)?$transferencia->numero_cuenta:''}}" required autofocus autocomplete="numero_cuenta">
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