@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="text-center mb-5">
    <h1><strong>Calificar</strong></h1>
</div>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2 p-3 cssproblemas overflow-auto border-right border-dark">
            @foreach($puntuaciones as $puntuacion)
            <a class="btn btn-primary w-100 mb-3">{{$problema->nombre}}</a>
            @endforeach
        </div>
        <div class="col cssproblemas">
            <div class="row mt-5">
                <div class="col d-flex justify-content-center">
                    <a href="" class="btn btn-success w-50">Ver ejercicio</a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="" class="btn btn-success w-50">Ver solución</a>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center mt-5 iframe">
                    <div class="embed-responsive embed-responsive-16by9 overflow-auto">
                        <iframe style="height: 800px;" class="embed-responsive-item" src="https://studio.code.org/projects/spritelab/K0sR3_Ah2W4nb504jAkYsp6Ju5qiJHOHGIJlZiZrXe4/embed" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col cssproblemas d-flex justify-content-center align-items-center border-left border-dark">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col text-center">
                        Estado:
                    </div>
                    <div class="col">
                        <select id="cars">
                            <option value="volvo">Sin calificar</option>
                            <option value="saab">Aceptado</option>
                            <option value="opel">Rechazado</option>
                            <option value="audi">Parcialmente resuelto</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col d-flex justify-content-center">
                        <a href="" class="btn btn-success w-50">Calificar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <h1>holaa</h1>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="" allowfullscreen></iframe>
    </div>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://studio.code.org/projects/spritelab/K0sR3_Ah2W4nb504jAkYsp6Ju5qiJHOHGIJlZiZrXe4/embed" allowfullscreen></iframe>
    </div>
    <iframe src="" frameborder="0"></iframe>
    <iframe width="392" height="620" style="border: 0px;" src="https://studio.code.org/projects/applab/qDwDUrBeIUwrNe0m0TMIbT3HcyrwELwU83QKBA0OfjE/embed"></iframe>
    <iframe width="392" height="620" style="border: 0px;" src="https://studio.code.org/projects/applab/7hAhxDtFRxADJFOGOMrRqMve63DAnVAx9vfptwOo8Un/embed?nosource"></iframe>ss -->
    @stop
    @section('css')
    <style>
        .cssproblemas {
            height: 600px;
        }

        .iframe {
            height: 500px;
        }
    </style>
    @stop
    @section('js')
    <script>
        console.log('Hi!');
    </script>

    @stop