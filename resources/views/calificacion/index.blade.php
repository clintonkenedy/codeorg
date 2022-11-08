@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="text-center">
    <h1>Calificar</h1>
</div>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-3 cssproblemas overflow-auto border-right border-dark">
            <button class="btn btn-primary w-100 mb-3">Ejercicio número 2</button>
            <button class="btn btn-primary w-100 mb-3">Ejercicio número 2</button>
        </div>
        <div class="col cssproblemas overflow-auto">
            <div class="row mt-5">
                <div class="col d-flex justify-content-center">
                    <a href="" class="btn btn-success w-50">Ver ejercicio</a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="" class="btn btn-success w-50">Ver solución</a>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://studio.code.org/projects/spritelab/K0sR3_Ah2W4nb504jAkYsp6Ju5qiJHOHGIJlZiZrXe4/embed" allowfullscreen></iframe>
                    </div>
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
</style>
@stop
@section('js')
<script>
    console.log('Hi!');
</script>

@stop