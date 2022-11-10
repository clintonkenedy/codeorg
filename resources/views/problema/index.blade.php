

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <a class="btn btn-success mb-2" href="{{route('problemas.create')}}" role="button">Crear nuevo Problema</a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="tproblemas" >
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">titulo</th>
                        <th scope="col">valor</th>
                        <th scope="col">entradas</th>
                        <th scope="col">salidas</th>
                        <th scope="col">problema</th>
                        <th scope="col">solucion</th>
                        <th scope="col">restricciones</th>
                        <th scope="col">acciones</th>
                        <th scope="col">descripcion</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($problemas as $problema)
                        <tr>
                            <th scope="row">{{$problema->id}}</th>
                            <td>{{$problema->titulo}}</td>
                            <td>{{$problema->valor}}</td>
                            <td>{{$problema->entradas}}</td>
                            <td>{{$problema->salidas}}</td>
                            <td>{{$problema->problema}}</td>
                            <td>{{$problema->solucion}}</td>
                            <td style="min-width: 200px;">{{$problema->restricciones}}</td>
                            <td width="100px">
                                <a class="btn btn-warning" href="{{route('problemas.edit',$problema->id)}}" role="button"><i class="fas fa-edit"></i></a>

                                <form action="{{route('problemas.destroy', $problema)}}" method="post"  style="display: inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            <td>{{$problema->descripcion}}</td>

                        </tr>

                    @endforeach


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


