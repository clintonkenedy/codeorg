

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="tproblemas" >
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">equipo</th>
                        <th scope="col">problema</th>
                        <th scope="col">calificador</th>
                        <th scope="col">enlace</th>
                        <th scope="col">reemix</th>
                        <th scope="col">enviar</th>
                        <th scope="col">intentos</th>
                        <th scope="col">estado</th>
                        <th scope="col">puesto</th>
                        <th scope="col">acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                 
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@stop
@section('css')
@stop
@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(document).ready(function () {
            $('#tproblemas').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "url": "{{asset("idioma/es_dtable.json")}}"
                }
            });
        });
    </script>
@stop
