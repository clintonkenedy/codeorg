@extends('layouts.app')

@section('navbar')
<nav class="navbar navbar-expand-md navbar-light navfondo shadow-lg">
    <div class="container w-100 d-block d-sm-block d-md-none">
        <div class="row  d-flex justify-content-between align-items-center">
            <div class="col">
                <img src="{{asset('img/logocode.png')}}" alt="no hay" class="img-fluid logocode">
            </div>
            <div class="col d-flex justify-content-end">
                <div class="navtext navtextsalibg">
                    <form action="{{route('kid.logout')}}" method="POST">
                        @method('POST')
                        @csrf
                        <button type="submit" class="bg-transparent border-0">
                            <img src="{{asset('img/icosalir.png')}}" alt="no hay" class="img-fluid" style="height: 30px;">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto d-block d-lg-block d-md-none">
                <img src="{{asset('img/mariob.png')}}" alt="no hay" class="img-fluid logocode">
            </ul>
            <ul class="navbar-nav ms-auto navtext navtextbg">
                <strong>Equipo:</strong> {{auth()->guard('kids')->check()?auth()->guard('kids')->user()->nombre: 'Team 1'}}
            </ul>
            <ul class="navbar-nav ms-auto d-lg-block d-md-none">
                <img src="{{asset('img/logocode.png')}}" alt="no hay" class="img-fluid logocode">
            </ul>
            <ul class="navbar-nav ms-auto navtext navtextbg">
                @livewire('temporizador')
            </ul>
            <ul class="navbar-nav ms-auto navtext navtextsalibg">
                <form action="{{route('kid.logout')}}" method="POST">
                    @method('POST')
                    @csrf
                    <button type="submit" class="bg-transparent border-0">
                        <img src="{{asset('img/icosalir.png')}}" alt="no hay" class="img-fluid" style="height: 30px;">
                    </button>
                </form>
            </ul>
        </div>
    </div>
</nav>
@stop

@section('content')
<div class="container-fluid">
    <div class="row mb-5 mt-3">
        <div class="col text-center fs-1">
            <div class="d-block d-sm-block d-md-none">
                <div class="navtext navtextbg mb-3">
                    <strong>Equipo:</strong> {{auth()->guard('kids')->check()?auth()->guard('kids')->user()->nombre: 'Team 1'}}
                </div>
                <div class="navtext navtextbg">
                    <strong>Tiempo:</strong> 02:22:53
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 col-lg-4 mb-3">
            <div class="navtext cssnamebg">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-4 d-flex justify-content-center">
                        <img src="{{asset('img/abred.png')}}" alt="no hay" class="img-fluid icopartici">
                    </div>
                    <div class="col">
                        {{$estudiantes->first()->nombre}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="navtext cssnamebg">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-4 d-flex justify-content-center">
                        <img src="{{asset('img/aba.png')}}" alt="no hay" class="img-fluid icopartici">
                    </div>
                    <div class="col">
                        {{$estudiantes->last()->nombre}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 ms-3">
        <div class="col-sm-4 col-md-4 col-lg-3">
            <div class="overflow-auto alto">
                @if(count($problemas)>0)
                @foreach($problemas as $problema)
                <a href="{{ route('concursos.show', $problema->id) }}">
                    <div class="me-3 pt-3 p-3 mb-3 csspregu d-flex justify-content-between align-items-center">
                        {{$problema->titulo}}
                        @if(!empty($aceptado))
                        <img src="{{asset('img/globocolor.png')}}" alt="no hay" class="img-fluid globo me-3">
                        @else
                        <img src="{{asset('img/globoblancoynegro.png')}}" alt="no hay" class="img-fluid globo me-3">
                        @endif
                    </div>
                </a>
                @endforeach
                @else
                <div class="text-danger fs-3 bg-light text-center">No hay problemas</div>
                @endif
            </div>
        </div>
        <div class="col">
            @if(!empty($problema_))
            <div class="container-fluid">
                <div class="row fs-5 border border-dark p-3 cssshowproblem overflow-auto">
                    <div class="col">
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
                                <strong>Entrada del problema:</strong>
                            </div>
                            <div class="col mb-3">
                                {{$problema_->entradas}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <strong>Salida del problema:</strong>
                            </div>
                            <div class="col mb-3">
                                {{$problema_->salidas}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <strong>Restricciones del problema:</strong>
                            </div>
                            <div class="col mb-3">
                                {{$problema_->restricciones}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <strong>Enlace del problema:</strong>
                            </div>
                            <div class="col mb-3">
                                <a href="{{$problema_->problema}}" target="_blank" class="text-primary text-decoration-underline"><strong>Click para ver el problema</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div style="height: 500px;" class="cssshowproblem fs-3 d-flex justify-content-center align-items-center">Selecione un ejercicio</div>
            @endif
        </div>
        <div class="col-3">
            <div class="container-fluid">
                @if(!empty($problema_))
                <div class="row fs-4 csslateral rounded-4 p-3">
                    @if(empty($aceptado))
                    <div class="col mb-3 d-flex justify-content-center">
                        <strong>Enlace de la solución del problema</strong>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <div>El campo esta vacio</div>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{route('reenviados.store')}}" method="POST" class="enviarLink">
                        @method('POST')
                        @csrf
                        <div class="col d-flex justify-content-center">
                            <input hidden type="text" name="problema" value="{{$problema_->id}}">
                            <textarea rows="5" cols="50" name="enlace" placeholder="Pegar el enlace de la solución" require type="text" class="mb-3 p-2"></textarea>
                        </div>
                        <div class="col d-flex justify-content-center">
                            @if(empty($esperando))
                            <button type="submit" class="w-75 btnenviar">Enviar</button>
                            @else
                            <div>Calificando solución...</div>
                            @endif
                        </div>
                    </form>
                    @else
                    <div>Problema resuelto</div>
                    @endif
                </div>
                @endif
                <div class="row mt-5 csslateral d-flex justify-content-center rounded-4">
                    <div class="col">
                        <h4 class="text-center mt-4">Historial de envios del ejercicio: <strong>{{!empty($problema_)?$problema_->titulo:'Titulo'}}</strong></h4>
                        <div class="d-flex justify-content-center">
                            <table class="table table-sm mt-4 mb-4 fs-5 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">N° de Intento</th>
                                        <th scope="col">Enviado en</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($problema_))
                                    @foreach($envios as $en)
                                    <tr>
                                        <td>{{$en->intentos}}</td>
                                        <td scope="row">02:05:00</td>
                                        <td>{{$en->estado}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>-</td>
                                        <td scope="row">-</td>
                                        <td>-</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>

</style>
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('enviarLink_')=='ok')
<script>
    Swal.fire(
        'Se envió correctamente',
        'Operación exitosa',
        'success'
    )
</script>
@endif
<script>
    $('.enviarLink').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Esta seguro que quiere enviar?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, quiero enviar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
@stop