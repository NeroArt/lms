@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Session::has('Mensaje'))
        <div class="alert alert-warning alert-dismissable"> 
            {{Session::get('Mensaje')}}
        </div>
    @endif
        <div class="col-md-8">
            <div class="card card-5">
                <div class="card-header">Gestión de Secciones de Curso</div>
                <div class="card-body">
                    <div>
                        <a href="{{url('/home')}}" class="btn btn-danger">Regresar</a>
                    </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" >
                        <thead class="thead-dark" >
                            <tr>
                                <th class="card-title">Curso</th>
                                <th class="card-title">Sección</th>
                                <th class="card-title">Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 1</td>
                                    <td style="background-color: rgb(114, 224, 110);">100%</td>
                                </tr>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 2</td>
                                    <td style="background-color: rgb(219, 97,   97);">0%</td>
                                </tr>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 3</td>
                                    <td style="background-color: rgb(219, 97,   97);">0%</td>
                                </tr>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 4</td>
                                    <td style="background-color: rgb(219, 97,   97);">0%</td>
                                </tr>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 5</td>
                                    <td style="background-color: rgb(219, 97,   97);">0%</td>
                                </tr>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 6</td>
                                    <td style="background-color: rgb(219, 97,   97);">0%</td>
                                </tr>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 7</td>
                                    <td style="background-color: rgb(219, 97,   97);">0%</td>
                                </tr>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 8</td>
                                    <td style="background-color: rgb(219, 97,   97);">0%</td>
                                </tr>
                                <tr>
                                    <td >ATENCIÓN DE LAS ENFERMEDADES CRÓNICO DEGENERATIVAS</td>
                                    <td >Sección 9</td>
                                    <td style="background-color: rgb(219, 97,   97);">0%</td>
                                </tr>
                    
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection