@extends('layouts.app')

@section('navbar')
<nav class="navbar navbar-expand-md navbar-light navfondo shadow-lg">
    <div class="container w-100 d-block d-sm-block d-md-none">
        <div class="row  d-flex justify-content-between align-items-center">
            <div class="col">
                <img src="{{asset('img/logocode.png')}}" alt="no hay" class="img-fluid logocode">
            </div>
            <div class="col d-flex justify-content-end">
                <form action="{{route('kid.logout')}}" method="POST">
                    @method('POST')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    {{--<a type="submit" class="ms-auto navtext navtextsalibg">
                        <img src="{{asset('img/icosalir.png')}}" alt="no hay" class="img-fluid" style="height: 30px;">
                    </a>--}}
                </form>
                {{--<a href="" class="ms-auto navtext navtextsalibg">
                    <img src="{{asset('img/icosalir.png')}}" alt="no hay" class="img-fluid" style="height: 30px;">
                </a>--}}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <img src="{{asset('img/mariob.png')}}" alt="no hay" class="img-fluid logocode">
            </ul>
            <ul class="navbar-nav ms-auto navtext navtextbg">
                <strong>Equipo:</strong> {{auth()->guard('kids')->check()?auth()->guard('kids')->user()->nombre: 'Team 1'}}
            </ul>
            <ul class="navbar-nav ms-auto">
                <img src="{{asset('img/logocode.png')}}" alt="no hay" class="img-fluid logocode">
            </ul>
            <ul class="navbar-nav ms-auto navtext navtextbg">
                <strong>Tiempo:</strong> 02:22:53
            </ul>
            <ul class="navbar-nav ms-auto navtext navtextsalibg">
                <form action="{{route('kid.logout')}}" method="POST">
                    @method('POST')
                    @csrf
                    <button type="submit">
                        <img src="{{asset('img/icosalir.png')}}" alt="no hay" class="img-fluid" style="height: 30px;">
                    </button>
{{--
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
--}}
                    {{--<a type="submit" class="ms-auto navtext navtextsalibg">
                        <img src="{{asset('img/icosalir.png')}}" alt="no hay" class="img-fluid" style="height: 30px;">
                    </a>--}}
                </form>

            </ul>
        </div>
    </div>
</nav>
@stop

@section('content')
<div class="container">
    <div class="row mb-5 mt-3">
        <div class="col text-center fs-1">
            <div class="d-block d-sm-block d-md-none">
                <div class="navtext navtextbg mb-3">
                    Grupo: Team 1
                </div>
                <div class="navtext navtextbg">
                    Grupo: Los mejores
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 col-lg-3 mb-3">
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
        <div class="col-sm-6 col-lg-3">
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
    <div class="row mt-5">
        <div class="col-sm-4 col-md-4 col-lg-3">
            <div class="overflow-auto alto">
                @if(count($problemas)>0)
                @foreach($problemas as $problema)
                <a href="{{ route('concursos.show', $problema->id) }}">
                    <div class="pt-3 ps-3 mb-3 csspregu d-flex justify-content-between align-items-center">
                        <p class="ms-3">{{$problema->titulo}}</p>
                        <img src="{{asset('img/globoblancoynegro.png')}}" alt="no hay" class="img-fluid globo me-3">
                    </div>
                </a>
                @endforeach
                @else
                <div class="text-danger fs-3 bg-light text-center">No hay problemas</div>
                @endif
            </div>
        </div>
        <div class="col text-dark">
            @if(!empty($problema_))
            <div class="container">
                <div class="row fs-5 border border-dark p-5 cssshowproblem overflow-auto">
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
                        <div class="row mt-5">
                            <div class="col mb-3 d-flex justify-content-center">
                                <strong>Enlace de la solución del problema</strong>
                            </div>
                            <form action="{{route('reenviados.store')}}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="col d-flex justify-content-center">
                                    <input hidden type="text" name="problema" value="{{$problema_->id}}">
                                    <input name="enlace" placeholder="Pegar el enlace de la solución" require type="text" class="w-50 mb-3 p-2">
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button class="w-50 btnenviar">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 d-flex justify-content-center">
                    <div class="col-6 border border-dark bg-light rounded-4">
                        <h4 class="text-center mt-4">Historial de envios del ejercicio: <strong>{{$problema_->titulo}}</strong></h4>
                        <div class="d-flex justify-content-center">
                            <table class="table table-sm w-50 mt-4 mb-4 fs-5 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">N° de Intento</th>
                                        <th scope="col">Enviado en</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($envios as $en)
                                    <tr>
                                        <td>{{$en->intentos}}</td>
                                        <td scope="row">02:05:00</td>
                                        <td>{{$en->estado}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div style="height: 500px;" class="cssshowproblem fs-3 d-flex justify-content-center align-items-center">Selecione un ejercicio</div>
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
