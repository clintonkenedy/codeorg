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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/concurso.css') }}" rel="stylesheet">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    @livewireStyles
    @livewireScripts
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
                    El Colegio de Ingenieros del Per?? CD Puno, Cap??tulo de Ingenier??a Industrial y de
                    Sistemas, comprometidos con el desarrollo del pensamiento computacional de la
                    ni??ez pune??a, organiza el I Concurso de Programaci??n ???Code Contest Kids??? - 2022

                </div>
            </div>

        </div>
    </footer>
    @yield('js')
</body>

</html>