@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <a class="btn btn-success mb-2" href="{{route('usuarios.create')}}" role="button">Crear nuevo Usuario</a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="tproblemas" >
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">roles</th>
                        <th scope="col">acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{$usuario->id}}</th>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                                @foreach($usuario->roles as $urol)
                                    <h5><span class="badge bg-cyan">{{$urol->name}}</span></h5></td>
                                @endforeach
                            <td width="100px">
                                <a class="btn btn-warning" href="{{route('usuarios.edit',$usuario->id)}}" role="button"><i class="fas fa-edit"></i></a>

                                <form action="{{route('usuarios.destroy', $usuario)}}" method="post"  style="display: inline">
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
