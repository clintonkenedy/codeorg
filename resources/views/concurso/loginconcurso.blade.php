<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/concurso.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class=" csslogin">
        <form action="{{route('concurso.login')}}" method="POST">
            @method('POST')
            @csrf
            <input name="code" type="text">
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>