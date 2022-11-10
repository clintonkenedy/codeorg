
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CREAR EQUIPO</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('equipos.store')}}" method="POST">
            @method('post')
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre Equipo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Codigo</label>
                        <input type="text" class="form-control" id="codigo" name="codigo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Puntuación</label>
                        <input type="text" class="form-control" id="puntuacion" name="puntuacion">
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
