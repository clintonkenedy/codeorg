@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/usuarios.css') }}" />
@section('content')
<div class="d-flex justify-content-center">
    <div class="container-fluid mt-2 p-3">
        <div class="row">
            <div class="col p-5 text-center">
            <div>
                <div class="row mb-5">
                    <div class="col p-3 rounded-5 csstitulo d-flex justify-content-between align-items-center">
                        <div class="ms-5 w-25 d-flex justify-content-between align-items-center">
                            <img src="{{asset('img/logocode.png')}}" alt="no hay" class="  " height="70px">
                            <h1 class="mt-3"><strong>Ranking</strong></h1>
                            <img src="{{asset('img/programa.png')}}" alt="no hay" class="" height="70px">
                        </div>
                        <div class="me-5 d-flex justify-content-between align-items-center w-25">
                            <h4 class="text-white text-bold mt-3">Organizado por:</h4>
                            <img src="{{asset('img/cip.png')}}" alt="no hay" class="  " height="45px">
                            <img src="{{asset('img/ingsistemas.png')}}" alt="no hay" class="  " height="50px">
                            <img src="{{asset('img/unap.png')}}" alt="no hay" class="  " height="50px">
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col csstable csstable-todos">
                            <div class="d-flex justify-content-center align-items-center mb-5">
                                <div class="cssequipos p-2">
                                    <h3 class="mt-2"><strong>Equipos</strong></h3>
                                </div>
                            </div>
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="10000">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <table class="table text-center rounded-4">
                                            <thead>
                                                <tr class="">
                                                    <th scope="col" class="w-25">Posición</th>
                                                    <th scope="col">Equipo</th>
                                                    <th scope="col">Participantes</th>
                                                    <th scope="col">Preguntas resultas</th>
                                                    <th scope="col">Tiempo acumulado</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                    <div class="carousel-item active">
                                        <table class="table text-center justify-content-center rounded-4">
                                            <thead>
                                                <tr class="">
                                                    <th scope="col" ><i class="fa fa-trophy fa-2x"></i> Posición</th>
                                                    <th scope="col"><i class="fa fa-users fa-2x"></i> Equipo</th>
                                                    <th scope="col"><i class="fa fa-user fa-2x"></i> Participantes</th>
                                                    <th scope="col"><i class="fa fa-question-circle fa-2x"></i> Preguntas resultas</th>
                                                    <th scope="col"><i class="fa fa-question-circle fa-2x"></i> Cant. Total</th>
                                                    <th scope="col"><i class="fa fa-clock-o fa-2x"></i> Tiempo acumulado</th>
                                                </tr>
                                            </thead>
                                            <tbody class="justify-content-center">
                                            {{$i=0}}
                                            @foreach($equipos as $e)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$e->nombre}}</td>
                                                    <td>{{$e->estudiantes->first()->nombre}} y {{$e->estudiantes->last()->nombre}}</td>
                                                    <td >
                                                        <div class="row justify-content-center">
                                                            @if($equipos[$i]->aceptados>0)
                                                                @for ($j = 0; $j< $equipos[$i]->aceptados; $j++)
                                                                    <div class="cuadro col-1"style="padding-right:0;padding-left:0;">
                                                                        <img src="{{asset('img/globoran_verde.png')}}" alt="no hay" class="  " height="40px">
                                                                    </div>
                                                                @endfor
                                                            @endif
                                                            @for ($j = 0; $j < 11 - $equipos[$i]->aceptados; $j++)
                                                                    <div class="cuadro col-1"style="padding-right:0;padding-left:0;">
                                                                        <img src="{{asset('img/globoran_negro.png')}}" alt="no hay" class="  " height="40px">
                                                                    </div>
                                                            @endfor
{{--
                                                            @for ($i = 0; $i < 11; $i++)
                                                                <div class="cuadro col-1"style="padding-right:0;padding-left:0;">
                                                                    <img src="{{asset('img/globoran_negro.png')}}" alt="no hay" class="  " height="40px">
                                                                </div>
                                                            @endfor--}}
                                                        </div>
                                                        <div hidden>{{$i++}}</div>
                                                    </td>
                                                    <td>{{$e->aceptados}}/11</td>
                                                    <td>{{$e->puntuacion}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 csstable csstable-top rounded-4">
                            <div class="row">
                                <div class="col-12">
                                <h3>Tabla de Posiciones</h3>
                            <table class="table text-center text-dark">
                                <thead>
                                    <tr class="csstr">
                                        <th scope="col" class="w-25">Posición</th>
                                        <th scope="col">Equipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('img/cup-au.png')}}" alt="no hay" class="  " height="30px"> 1
                                        </td>
                                        <td>{{$equipos[0]->nombre}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{asset('img/cup-ag.png')}}" alt="no hay" class="  " height="30px"> 2
                                        </td>
                                        <td>{{$equipos[1]->nombre}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{asset('img/cup-cu.png')}}" alt="no hay" class="  " height="30px"> 3
                                        </td>
                                        <td>{{$equipos[2]->nombre}}</td>
                                    </tr>
                                </tbody>
                            </table>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                <h3>Leyenda</h3>
                            <table class="table text-center text-dark">
                                <thead>
                                    <tr class="csstr">
                                        <th scope="col" class="w-25">Estado</th>
                                        <th scope="col">Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('img/globoran_rojo.png')}}" alt="no hay" class="  " height="30px">
                                        </td>
                                        <td>Rechazado</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{asset('img/globoran_amarillo.png')}}" alt="no hay" class="  " height="30px">
                                        </td>
                                        <td>Con Observaciones</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{asset('img/globoran_verde.png')}}" alt="no hay" class="  " height="30px">
                                        </td>
                                        <td>Aceptado</td>
                                    </tr>
                                </tbody>
                            </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
