@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col text-center fs-1">
            <div class="d-block d-sm-block d-md-none">
                <div class="navtext mb-3">
                    Grupo: Team 1
                </div>
                <div class="navtext">
                    Grupo: Los mejores
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-3">
            <div class="overflow-auto alto">
                @foreach($problemas as $problema)
                <a href="{{ route('concursos.show', $problema->id) }}">
                    <div class="pt-3 ps-3 mb-3 csspregu d-flex justify-content-between align-items-center">
                        <p class="ms-3">{{$problema->titulo}}</p>
                        <img src="{{asset('img/globoblancoynegro.png')}}" alt="no hay" class="img-fluid globo me-3">
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col text-dark">
            @if(!empty($problema_))
            <div class="container fs-5 border border-dark p-5 cssshowproblem overflow-auto">
                <div class="row text-center mb-4">
                    <div class="col fs-1">
                        {{$problema_->titulo}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Descripción del problema:</strong>
                    </div>
                    <div class="col mb-3">
                        {{$problema_->descripcion}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Objetivo del problema:</strong>
                    </div>
                    <div class="col mb-3">
                        {{$problema_->objetivo}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Enlace del problema:</strong>
                    </div>
                    <div class="col mb-3">
                        <a href="{{$problema_->problema}}" class="text-primary text-decoration-underline"><strong>Click para ver el prolema</strong></a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col mb-3 d-flex justify-content-center">
                        <strong>Enlace de la solución del problema</strong>
                    </div>
                    <form action="" method="POST">
                        <div class="col d-flex justify-content-center">
                            <input placeholder="Pegar el link de la solución" require type="text" class="w-50 mb-3 p-2">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button class="w-50 btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <p class="fs-3">Selecione un ejercicio</p>
            @endif
        </div>
    </div>
</div>
@stop

@section('css')
<style>

</style>
@stop

@section('js')
<script>
    console.log('Hi concurso!');
</script>
@stop