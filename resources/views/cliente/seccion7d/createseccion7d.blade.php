@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@vite(['resources/js/seccion7d.js'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-5">
                <div class="card-header">Creación de curso - Sección 7D</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body" >

                            <div class="row">
                                <form action="" id="myForm">
                                    <div class="mb-3">
                                        <div class="name">Describir la Etapa de Apertura: </div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <textarea id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="name">Duración de la Actividad (Cuantos minutos dura la actividad): </div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" required> 
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="name">Describir las Técnicas: </div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="name">Material y Equipo de Apoyo: </div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="name">a)	El instructor realizará la evaluación diagnóstica:
                                            
                                            </div>
                                        <label class="input-group wrap-input100 validate-input" >Indicará alcance/propósito/finalidad de la evaluación </label>
                                        <label class="input-group wrap-input100 validate-input" >Redactar el objetivo de esta evaluación</label>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <textarea id="actividad[0]" class="form-control" type="text" name="actividad[0]" autocomplete="actividad[0]" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="name">b)	Indicará las instrucciones de la evaluación: </div>
                                        <label class="input-group wrap-input100 validate-input" >Redactar para que sirve esta evaluación e Instrucciónes</label>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <textarea id="actividad[1]" class="form-control" type="text" name="actividad[1]" autocomplete="actividad[1]" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="name">c)	Indicará el tiempo para realizar la evaluación:</div>
                                        <div class="input-group wrap-input100 validate-input" >
                                            <input id="actividad[2]" class="form-control" type="text" name="actividad[2]" autocomplete="actividad[2]" placeholder="Ejemplo: 10 minutos" required>
                                        </div>
                                    </div>
                                    <label class="input-group wrap-input100 validate-input" >d)	Aclarará las dudas que se presenten.</label>
                                    <label class="input-group wrap-input100 validate-input" >e)	Mencionará a los participantes que los errores u omisiones que se presenten durante el curso, son oportunidades para fortalecer el aprendizaje..</label>
                                    <button type="submit">Guardar</button>
                                </form>
                            </div>
                            <a href="{{url('/seccion8a/create')}}" class="btn btn-success">Siguiente</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/menulateral.js'])
@endsection