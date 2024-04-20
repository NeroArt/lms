@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=USD"></script>
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Pago de Curso - No: 1</div>
                <div class="card-body">
                    

                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js', 'resources/js/modal.js', 'resources/css/modal.css', 'resources/js/paypal.js'])
@endsection