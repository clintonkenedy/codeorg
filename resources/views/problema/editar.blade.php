
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR PROBLEMA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('problemas.update',$problema)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" value="{{$problema->titulo}}" name="titulo">
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control" id="valor" value="{{$problema->valor}}" name="valor">
                    </div>
                </div>


                <div class="form-group">
                    <label for="titulo">Descripcion</label>
                    <textarea class="form-control" id="descripcion" value="" rows="3" name="descripcion">{{$problema->descripcion}}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="entradas">Entradas</label>
                        <input type="text" class="form-control" value="{{$problema->entradas}}" id="entradas" name="entradas">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="salidas">Salidas</label>
                        <input type="text" class="form-control" value="{{$problema->salidas}}" id="salidas" name="salidas">
                    </div>
                </div>
                <div class="form-group">
                    <label for="restricciones">Restricciones</label>
                    <textarea class="form-control" id="restricciones"  value="" rows="3" name="restricciones">{{$problema->restricciones}}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="problema">Problema</label>
                        <input type="text" class="form-control" value="{{$problema->problema}}" id="problema" name="problema">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="solucion">Solucion</label>
                        <input type="text" class="form-control" value="{{$problema->solucion}}" id="solucion" name="solucion">
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
