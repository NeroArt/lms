@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/password_toggle.js','resources/js/email_toggle.js'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Session::has('Error'))
        <div class="alert alert-warning alert-dismissable"> 
            {{Session::get('Error')}}
        </div>
    @endif
    @if (Session::has('Mensaje'))
    <div class="alert alert-warning alert-dismissable"> 
        {{Session::get('Mensaje')}}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Editar Perfil</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        
                        <div class="col">
                            <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
                        </div>
                    </div>
                    <br>
                    <form action="{{url('/profile')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" value="{{ Auth::user()->id }}" name="id_user" id="id_user">
                        <div class="mb-3">
                            <div class="name ">Nombre de Usuario</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="name" class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus autocomplete="Nombres">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>

                        <div class="mb-3">
                            <div class="name ">CURP</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="curp" class="form-control" type="text" name="curp" value="{{ Auth::user()->curp }}" required autofocus autocomplete="CURP">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name ">Teléfono Celular</div>
                                <div class="input-group wrap-input100 validate-input" >
                                    <input id="telefono_celular" class="form-control" type="text" name="telefono_celular" value="{{ Auth::user()->telefono_celular }}" required autofocus autocomplete="Teléfono Celular">
                                    <span class="focus-input100 "></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                                </div>
                        </div>
                        <div class="mb-3">
                            <div class="name">Cambiar correo electronico</div>
                            <!-- Checkbox para cambiar el correo electronico -->
                            <label for="">¿Esta seguro de modificar el correo electronico?</label>
                            <input type="checkbox" name="cambiaremail" id="cambiaremail">
                            
                            <!-- Campo de contraseña que se mostrará si el checkbox está marcado -->
                            <div id="email-field" style="display: none;">
                                <div class="mb-3">
                                    <div class="name ">Correo Electronico</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="email" class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" required autofocus autocomplete="Email">
                                            <span class="focus-input100 "></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                        </div>
                                </div>
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
                        


                        <input type="submit" class="btn btn-success" value="Modificar">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection