@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 1</div>
                <div class="card-body">
                    
                    <a href="#" id="abrirModal">Abrir Ventana Modal</a>
<div id="miModal" class="modal">
    <div class="modal-content">
        <span class="close">×</span>
        <div class="video-wrapper">
            <iframe id="miVideo"  frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js', 'resources/js/modal.js', 'resources/css/modal.css'])
@endsection