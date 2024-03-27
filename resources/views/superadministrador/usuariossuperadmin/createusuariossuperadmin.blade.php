@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/password_toggle.js'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Editar Usuarios</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        
                        <div class="col">
                            <a href="{{url('/usuariossuperadmin')}}" class="btn btn-danger">Regresar</a>
                        </div>
                    </div>
                    <br>
                    <form action="{{url('/usuariossuperadmin')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        
                        <div class="mb-3">
                            <div class="name ">Nombre de Usuario</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="name" class="form-control" type="text" name="name"  required autofocus autocomplete="Nombres">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Correo electronico</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="email" class="form-control" type="email" name="email"  required autofocus autocomplete="email">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Contraseña</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="password" class="form-control" type="password" name="password"  required autofocus autocomplete="contraseña">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">CURP</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="curp" class="form-control" type="text" name="curp"  required autofocus autocomplete="CURP">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Teléfono Celular</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="telefono_celular" class="form-control" type="text" name="telefono_celular" required autofocus autocomplete="Teléfono Celular">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <div class="mb-3">
                            <div class="name ">Seleccionar Rol de Usuario</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <select name="roles_id" id="roles_id" class="form-control" required autofocus autocomplete="Status" >
                                        <option value="1" >Administrador</option>
                                        <option value="2" >Cliente</option>
                                    </select>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <div class="mb-3">
                            <div class="name ">Seleccionar Status</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <select name="status" id="status" class="form-control" required autofocus autocomplete="Status" >
                                        <option value="1" style="background-color: rgb(114, 224, 110);">Activo</option>
                                        <option value="0" style="background-color: rgb(219, 97, 97);">Inactivo</option>
                                    </select>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        

                        <input type="submit" class="btn btn-success" value="Crear">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection