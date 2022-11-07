@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    <a class="btn btn-success mb-2" href="{{route('roles.create')}}" role="button">Crear nuevo Rol</a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="tproblemas" >
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">permiso</th>
                        <th scope="col">acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $rol)
                        <tr>
                            <th scope="row">{{$rol->id}}</th>
                            <td>{{$rol->name}}</td>
                            <td>
                                @foreach($rol->permissions as $rper)
                                    <span class="badge bg-cyan">{{$rper->name}}</span>
                                @endforeach
                            </td>
                            <td width="100px">
                                <a class="btn btn-warning" href="#" role="button"><i class="fas fa-edit"></i></a>

                                <form action="{{route('roles.destroy', $rol)}}" method="post"  style="display: inline">
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
