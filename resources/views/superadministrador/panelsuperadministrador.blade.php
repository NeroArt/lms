@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">PANEL DE CONTROL</div>

                <div class="card-body">
                    <div>
                        <a href="{{ url('/usuariossuperadmin') }}"><input
                                class="btn-primary" type="submit"
                                value="Gestión de Usuarios"></a>
                    </div>
                    <br>
                    <div>
                        <a href="{{ url('/superadminpagos') }}"><input
                            class="btn-primary" type="submit"
                                value="Gestión de Pagos"></a>
                    </div>
                    <br>
                    <div>
                        <a href="{{ url('/seguimientosuperadmin') }}"><input
                            class="btn-primary" type="submit"
                                value="Seguimiento de Certificaciones"></a>
                    </div>

                    <br>
                    <div>
                        <a href="{{ url('/transferencia') }}"><input
                            class="btn-primary" type="submit"
                                value="Gestión de No. de Cuentas"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
