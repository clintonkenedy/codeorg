@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR ROL</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <form action="{{route('roles.update',$rol)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group col-md">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" value="{{$rol->name}}" id="name" name="name">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="">Roles</label>
                            @foreach($permisos as $permiso)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" value="{{$permiso->id}}" {{in_array($permiso->id, $rolePermissions)?'checked':''}}  name="permisos[]">
                                        </div>
                                    </div>
                                    <input type="text"  class="form-control" aria-label="Text input with checkbox" value="{{$permiso->name}}" disabled>

                                </div>
                            @endforeach
                        </div>
                    </div>


                    <a href="{{route('roles.index')}}" class="btn btn-primary ">Regresar</a>
                    <button class="btn btn-success float-right">Crear</button>
                </form>
            </div>
        </div>
    </div>


@stop
@section('css')
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop

