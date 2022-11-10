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
            @foreach($equipos as $eq)
            <tr>
                <td>{{$eq->nombre}}</td>
                <td>{{$eq->estudiantes->first()->nombre}}-{{$eq->estudiantes->last()->nombre}}</td>
                <td>{{$eq->puntuacion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
