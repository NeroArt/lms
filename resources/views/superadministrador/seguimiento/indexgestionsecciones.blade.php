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
                        <a href="{{url('/seguimientosuperadmin')}}" class="btn btn-danger">Regresar</a>
                    </div>
                    <br>

                <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead class="thead-dark" >
                        <tr>
                            <th class="card-title">Acción</th>
                            <th class="card-title">Nombre de Seccion</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion1/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 1
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion2/' . $cursoId )}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 2
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion3/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 3A
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion3b/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 3B
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion3c/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 3C
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion3d/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 3D
                            </td>
                        </tr>
                        
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion4/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 4
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion5/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 5
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion6/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 6
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion7a/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 7A
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion7b/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 7B
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion7c/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 7C
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion7d/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 7D
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion8a/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 8A
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion8b/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 8B
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion8c/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 8C
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion8d/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 8D
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion8e/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 8E
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion8f/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 8F
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9a/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9A
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9b/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9B
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9c/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9C
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9d/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9D
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9e/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9E
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9f/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9F
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9g/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9G
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9h/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9H
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9i/'  . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9I
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9j/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9J
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <a class="btn btn-warning" href="{{url('/seccion9k/' . $cursoId)}}">Editar
                                </a>
                            </td>
                            <td>
                                Sección 9K
                            </td>
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