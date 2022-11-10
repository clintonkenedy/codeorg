

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <a class="btn btn-success mb-2" href="{{route('estudiantes.create')}}" role="button">Crear nuevo estudiante</a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="testudiantes" >
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($estudiante as $estudiante)
                        <tr>
                            <th>{{$estudiante->id}}</th>
                            <td>{{$estudiante->nombre}}</td>
                            <td>{{$estudiante->apellido_p}}</td>
                            <td>{{$estudiante->apellido_m}}</td>
                            <td>{{$estudiante->dni}}</td>
                            <td>{{$estudiante->equipo_id}}</td>
                            <td width="100px">
                                <a class="btn btn-warning" href="{{route('estudiantes.edit',$estudiante->id)}}" role="button"><i class="fas fa-edit"></i></a>
                                <form action="{{route('estudiantes.destroy', $estudiante)}}" method="post"  style="display: inline">
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
            $('#testudiantes').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "url": "{{asset("idioma/es_dtable.json")}}"
                }
            });
        });
    </script>
@stop


