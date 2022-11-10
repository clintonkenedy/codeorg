
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR EQUPO</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('equipos.update', $equipo)}}" method="POST">
            @method('put')
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre Equipo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$equipo->nombre}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Codigo</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{$equipo->codigo}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Puntuación</label>
                        <input type="text" class="form-control" id="puntuacion" name="puntuacion" value="{{$equipo->puntuacion}}">
                    </div>
                </div>
                <a href="{{route('equipos.index')}}" class="btn btn-primary ">Regresar</a>
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
