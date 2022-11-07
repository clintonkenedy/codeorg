@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CREAR ROL</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('roles.store')}}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group col-md-6">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Roles</label>
                        <select id="inputState" class="form-control">
                            <option value="" selected>Seleciona Permisos</option>
                            @foreach($permisos as $permiso)
                                <option value="{{$permiso->name}}">{{$permiso->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <a href="{{route('roles.index')}}" class="btn btn-primary ">Regresar</a>
                <button type="submit" class="btn btn-success float-right">Crear</button>
            </form>
        </div>
    </div>

@stop
@section('css')
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop

