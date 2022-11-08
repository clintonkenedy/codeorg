@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CREAR USUARIO</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('usuarios.store')}}" method="POST">
                @method('POST')
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="conpassword">Confirma Contraseña</label>
                        <input type="password" class="form-control" id="conpassword" name="conpassword">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rol">Roles</label>
                        <select id="rol" class="form-control" name="rol">
                            @foreach($roles as $rol)
                                <option value="{{$rol->name}}">{{$rol->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <a href="{{route('usuarios.index')}}" class="btn btn-primary ">Regresar</a>
                <button class="btn btn-success float-right">Crear</button>
            </form>
        </div>
    </div>

@stop
@section('css')
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
