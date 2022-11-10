
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CREAR ESTUDIANTE</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('estudiantes.store')}}" method="POST">
            @method('POST')
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidop" name="apellidop">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidom" name="apellidom">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Dni</label>
                        <input type="text" class="form-control" id="dni" name="dni">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Equipo</label>
                        <select id="inputState" class="form-control" name="equipo">
                            @foreach ($equipo as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <a href="{{route('estudiantes.index')}}" class="btn btn-primary ">Regresar</a>
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
