@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="text-center mb-1">
    <h1><strong>Calificar</strong></h1>
</div>
@stop

@section('content')
<div class="container-fluid cssfontfamily">
    <div class="row">
        <div class="col-sm-5 col-lg-3 p-3 cssproblemas overflow-auto border-right border-dark">
            @if(count($puntuaciones)>0)
            @foreach($puntuaciones as $puntuacion)
            @if($puntuacion->estado=='Enviado')
            <a href="{{ route('calificaciones.show', $puntuacion->id) }}" class="btn cssbtn w-100 mb-3 p-3">{{$puntuacion->Problema->titulo}}</a>
            @endif
            @endforeach
            @foreach($puntuaciones as $puntuacion)
            @if($puntuacion->estado=='Aceptado')
            <a href="{{ route('calificaciones.show', $puntuacion->id) }}" class="btn bg-transparent border border-dark w-100 mb-3 p-2">{{$puntuacion->Problema->titulo}}</a>
            @endif
            @endforeach
            @else
            <div class="text-info h-100 d-flex justify-content-center align-items-center">
                <strong>Esperando ejercicios...</strong>
            </div>
            @endif
        </div>
        <div class="col cssproblemas">
            @if(!empty($puntuacion_) and ($puntuacion_->estado=='Enviado'))
            <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <div class="row w-75 p-3 cssestados">
                        <div class="col d-flex justify-content-center">

                            <a href="{{route('calificaciones.estado',['id'=>$puntuacion_->id,'estado'=>'Aceptado'])}}" class="btn cssbtn2 btn-success w-100 rounded-pill d-flex justify-content-center align-items-center">Aceptar</a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="" class="btn cssbtn2 btn-secondary w-100 rounded-pill d-flex justify-content-center align-items-center">Parcialmente aceptado</a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{route('calificaciones.estado',['id'=>$puntuacion_->id,'estado'=>'Rechazado'])}}" class="btn cssbtn2 btn-danger w-100 rounded-pill d-flex justify-content-center align-items-center">Rechazar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-4 d-flex justify-content-center">
                    <a href="" class="btn cssbtn w-50">Ver ejercicio</a>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <a href="" class="btn cssbtn w-50">Ver solución</a>
                </div>
            </div>
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-4">
                    <div class="embed-responsive embed-responsive-1by1 iframe overflow-auto">
                        <iframe style="height: 550px;" class="embed-responsive-item" src="https://studio.code.org/projects/spritelab/K0sR3_Ah2W4nb504jAkYsp6Ju5qiJHOHGIJlZiZrXe4/embed" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-4">
                    <div class="embed-responsive embed-responsive-1by1 iframe overflow-auto">
                        <iframe style="height: 550px;" class="embed-responsive-item" src="https://studio.code.org/projects/spritelab/K0sR3_Ah2W4nb504jAkYsp6Ju5qiJHOHGIJlZiZrXe4/embed" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            @elseif(!empty($puntuacion_) and (($puntuacion_->estado=='Aceptado') or ($puntuacion_->estado=='Rechazado')))
            <div class="row h-100 d-flex justify-content-center align-items-center">
                <div class="col-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Nombre del problema</th>
                                <th scope="col" class="text-center">Calificado como:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$puntuacion_->Problema->titulo}}</td>
                                <td class="d-flex justify-content-center">
                                <span class="badge badge-primary p-2 w-100">{{$puntuacion_->estado}}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="row h-100">
                <div class="col d-flex justify-content-center align-items-center bg-dange">
                    Seleccione un ejercicio
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
@stop
@section('css')
<style>
    ul {
        list-style-type: none;
    }

    .iframe {
        height: 100%;
    }

    .cssestados {
        background-color: #485058;
        border-radius: 50px;
        border: 4px solid white;
        box-shadow: 0px 0px 10px #485058;
    }

    .cssfontfamily {
        font-family: Verdana, Geneva, sans-serif;
    }

    .cssproblemas {
        height: 700px;
    }

    .cssbtn {
        text-decoration: none;
        background-color: #485058;
        color: whitesmoke;
        border-radius: 10px;
    }

    .cssbtn:hover {
        color: whitesmoke;
        letter-spacing: 0.5px;
        transition: letter-spacing 0.5s;
    }

    .cssbtn2:hover {
        color: whitesmoke;
        letter-spacing: 1px;
        transition: letter-spacing 0.5s;
    }
</style>
@stop
@section('js')
<script>
    console.log('Hi!');
    Pusher.logToConsole = true;

    var pusher = new Pusher('f66ba4ef55acfb30f359', {
        cluster: 'us2'
    });

    var channel = pusher.subscribe('t-channel');
    channel.bind('t-event', function(data) {
        //alert(JSON.stringify(data));
        window.livewire.emit('emitir1');
    });
</script>



@stop




