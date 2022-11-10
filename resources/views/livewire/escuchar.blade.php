<div>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Participantes</th>
                <th scope="col">Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($problemas as $problema)
            <tr>
                <td>{{$problema->titulo}}</td>
                <td>{{$problema->descripcion}}</td>
                <td>{{$problema->problema}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>