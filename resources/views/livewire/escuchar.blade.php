<div>
    <div class="row mb-5">
        <div class="col p-3 rounded-5 csstitulo d-flex justify-content-between align-items-center">
            <div class="ms-5 w-25 d-flex justify-content-between align-items-center">
                <img src="{{asset('img/logocode.png')}}" alt="no hay" class="  " height="70px">
                <h1 class="mt-3"><strong>Ranking</strong></h1>
                <img src="{{asset('img/programa.png')}}" alt="no hay" class="" height="70px">
            </div>
            <div class="me-5 d-flex justify-content-between align-items-center w-25">
                <h4 class="text-dark mt-3">Organizado por:</h4>
                <img src="{{asset('img/cip.png')}}" alt="no hay" class="  " height="45px">
                <img src="{{asset('img/ingsistemas.png')}}" alt="no hay" class="  " height="50px">
                <img src="{{asset('img/unap.png')}}" alt="no hay" class="  " height="50px">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col csstable csstable-todos m-3">
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
                    <div class="carousel-item active">
                        <table class="table text-center rounded-4">
                            <thead>
                                <tr class="">
                                    <th scope="col" class="w-25">Posición</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Participantes</th>
                                    <th scope="col">Preguntas resultas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($equipos); $i++) <tr>
                                    <td>
                                        {{$i +1 }}
                                    </td>
                                    <td>
                                        {{$equipos[$i]->nombre}}
                                    </td>
                                    <td>{{$equipos[$i]->estudiantes->first()->nombre}}-{{$equipos[$i]->estudiantes->last()->nombre}}</td>
                                    <td>
                                        @if($puntos>0)
                                        @for ($j = 0; $j< $puntos; $j++) <img src="{{asset('img/globoran_color.png')}}" alt="no hay" class="  " height="45px">
                                            @endfor
                                            @endif
                                            @for ($j = 0; $j < 11 - $puntos; $j++) <img src="{{asset('img/globoran_negro.png')}}" alt="no hay" class="  " height="45px">
                                                @endfor
                                    </td>
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="carousel-item">
                        <table class="table text-center">
                            <thead>
                                <tr class="">
                                    <th scope="col" class="w-25">Posición</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Participantes</th>
                                    <th scope="col">Preguntas resultas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($equipos); $i++) <tr>
                                    <td>
                                        {{$i +1 }}
                                    </td>
                                    <td>
                                        {{$equipos[$i]->nombre}}
                                    </td>
                                    <td>{{$equipos[$i]->estudiantes->first()->nombre}}-{{$equipos[$i]->estudiantes->last()->nombre}}</td>
                                    <td>
                                        @if($puntos>0)
                                        @for ($j = 0; $j< $puntos; $j++) <img src="{{asset('img/globoran_color.png')}}" alt="no hay" class="  " height="45px">
                                            @endfor
                                            @endif
                                            @for ($j = 0; $j < 11 - $puntos; $j++) <img src="{{asset('img/globoran_negro.png')}}" alt="no hay" class="  " height="45px">
                                                @endfor
                                    </td>
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 csstable csstable-top rounded-4">
            <h1>Top</h1>
            <table class="table text-center text-dark">
                <thead>
                    <tr class="csstr">
                        <th scope="col" class="w-25">Posición</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Participantes</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($equipos); $i++) <tr>
                        <td>
                            {{$i +1 }}
                        </td>
                        <td>
                            {{$equipos[$i]->nombre}}
                        </td>
                        <td>{{$equipos[$i]->estudiantes->first()->nombre}}-{{$equipos[$i]->estudiantes->last()->nombre}}</td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>