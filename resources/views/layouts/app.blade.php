<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/concurso.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="app">
        @yield('navbar')
        <main class="">
            @yield('content')
        </main>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="row mt-3 pb-3 d-flex justify-content-center">
                    <div class="col-2 d-flex justify-content-around align-items-center">
                        <img src="{{asset('img/cip.png')}}" alt="no hay" class="img-fluid" style="height: 50px;">
                        <img src="{{asset('img/ingsistemas.png')}}" alt="no hay" class="img-fluid" style="height: 50px;">
                        <img src="{{asset('img/unap.png')}}" alt="no hay" class="img-fluid" style="height: 50px;">
                    </div>
                </div>
                <div class="col fs-5">
                    El Colegio de Ingenieros del Perú CD Puno, Capítulo de Ingeniería Industrial y de
                    Sistemas, comprometidos con el desarrollo del pensamiento computacional de la
                    niñez puneña, organiza el I Concurso de Programación “Code Contest Kids” - 2022

                </div>
            </div>

        </div>
    </footer>
    @yield('js')
</body>

</html>