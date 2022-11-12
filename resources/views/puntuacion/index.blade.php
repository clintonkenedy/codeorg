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
                    {{--<tbody>
                    @foreach($puntuaciones as $p)
                        <tr>

                            <th scope="row">{{$p->id}}</th>
                            <td>{{$p->equipo_id}}</td>
                            <td>{{$p->problema_id}}</td>
                            <td>{{$p->user_id}}</td>
                            <td>{{$p->enlace}}</td>
                            <form action="{{route('reenviados.update',$p)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <td>
                                    <input type="text" name="reemix" class="form-control" value="{{$p->reemix}}">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </td>

                            </form>

                            <td>{{$p->intentos}}</td>
                            <td>{{$p->estado}}</td>
                            <td>{{$p->puesto}}</td>
                            <td width="100px">
                                <a class="btn btn-warning" href="{{route('problemas.edit',$p->id)}}" role="button"><i class="fas fa-edit"></i></a>

                                <form action="{{route('problemas.destroy', $p)}}" method="post"  style="display: inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>--}}
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
