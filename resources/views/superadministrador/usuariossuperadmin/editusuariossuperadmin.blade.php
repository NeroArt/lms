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
                    <form action="{{url('/usuariossuperadmin/'.$usuario->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="mb-3">
                            <div class="name ">Nombre de Usuario</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="name" class="form-control" type="text" name="name" value="{{isset($usuario->name)?$usuario->name:''}}" required autofocus autocomplete="Nombres">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Correo electronico</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="email" class="form-control" type="email" name="email" value="{{isset($usuario->email)?$usuario->email:''}}" required autofocus autocomplete="email">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">CURP</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="curp" class="form-control" type="text" name="curp" value="{{isset($usuario->curp)?$usuario->curp:''}}" required autofocus autocomplete="CURP">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Teléfono Celular</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="telefono_celular" class="form-control" type="text" name="telefono_celular" value="{{isset($usuario->telefono_celular)?$usuario->telefono_celular:''}}" required autofocus autocomplete="Teléfono Celular">
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
                                        @if ($usuario->roles_id == 1)
                                        <option value="1" style="background-color: rgb(215, 235, 35);">Actual: Administrador</option>
                                        @endif
                                        @if ($usuario->roles_id == 2)
                                        <option value="2" style="background-color: rgb(215, 235, 35);">Actual: Cliente</option>
                                        @endif
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
                                        @if ($usuario->status == 1)
                                        <option value="1" style="background-color: rgb(215, 235, 35);">Actual: Activo</option>
                                        @endif
                                        @if ($usuario->status == 0)
                                        <option value="0" style="background-color: rgb(215, 235, 35);">Actual: Inactivo</option>
                                        @endif
                                        <option value="1" style="background-color: rgb(114, 224, 110);">Activo</option>
                                        <option value="0" style="background-color: rgb(219, 97, 97);">Inactivo</option>
                                    </select>
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name">Cambiar contraseña</div>
                            <!-- Checkbox para cambiar la contraseña -->
                            <label for="">¿Esta seguro de modificar la contraseña?</label>
                            <input type="checkbox" name="cambiarpassword" id="cambiarpassword">
                            
                            <!-- Campo de contraseña que se mostrará si el checkbox está marcado -->
                            <div id="password-field" style="display: none;">
                                <input type="password" name="password">
                            </div>

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