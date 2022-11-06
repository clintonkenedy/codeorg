
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CREAR PROBLEMA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('problemas.store')}}" method="POST">
            @method('POST')
            @csrf
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group">
                    <label for="titulo">Descripcion</label>
                    <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="entradas">Entradas</label>
                        <input type="text" class="form-control" id="entradas" name="entradas">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="salidas">Salidas</label>
                        <input type="text" class="form-control" id="salidas" name="salidas">
                    </div>
                </div>
                <div class="form-group">
                    <label for="restricciones">Restricciones</label>
                    <textarea class="form-control" id="restricciones" rows="3" name="restricciones"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="problema">Problema</label>
                        <input type="text" class="form-control" id="problema" name="problema">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="solucion">Solucion</label>
                        <input type="text" class="form-control" id="solucion" name="solucion">
                    </div>
                </div>
                <a href="{{route('problemas.index')}}" class="btn btn-primary ">Regresar</a>
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
