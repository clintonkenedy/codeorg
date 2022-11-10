@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<a class="btn btn-success mb-2" href="{{route('equipos.create')}}" role="button">Crear nuevo equipo</a>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="tequipos" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Equipo</th>
                    <th>Codigo</th>
                    <th>Puntuación</th>
                    <th>acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipo as $equipo)
                    <tr>
                        <th>{{$equipo->id}}</th>
                        <td>{{$equipo->nombre}}</td>
                        <td>{{$equipo->codigo}}</td>
                        <td>{{$equipo->puntuacion}}</td>
                        <td width="100px">
                            <a class="btn btn-warning" href="{{route('equipos.edit',$equipo->id)}}" role="button"><i class="fas fa-edit"></i></a>
                            <form action="{{route('equipos.destroy', $equipo)}}" method="post"  style="display: inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
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
            $('#tequipos').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "url": "{{asset("idioma/es_dtable.json")}}"
                }
            });
        });
    </script>
@stop