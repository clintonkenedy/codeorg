@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="container bg-light mt-5 rounded-5 p-3">
        <div class="row">
            <div class="col text-center">
                <h2>Ranking</h2>
            </div>
        </div>
        <div class="row p-3">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Posición</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark y Omar</td>
                        <td>100</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop