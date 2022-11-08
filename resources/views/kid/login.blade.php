@extends('layouts.app')

@section('content')
    <div class="cssloginbg d-flex justify-content-center align-items-center">
        <div class="csslogindiv ">
            <div class="container">
                @if($error = \Session::get('error'))
                    <div class="alert alert-danger">{{$error}}</div>
                @endif
                <div class="row">
                    <div class="col">
                        <div class="row d-flex">
                            <div class="col d-flex justify-content-center">
                                <img src="{{asset('img/abred3.png')}}" alt="no hay" class="img-fluid logocode">
                                <img src="{{asset('img/logocode.png')}}" alt="no hay" class="img-fluid logocode">
                            </div>
                            <!-- <div class="col">
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="{{route('kid.login')}}" method="POST" class="text-center">
                                    @method('POST')
                                    @csrf
                                    <div class="form-group fs-2 mt-2 mb-3">
                                        <label for="code">Ingrese el código</label>
                                    </div>
                                    <div class="form-group fs-4">
                                        <input name="code" class="text-center" type="text" placeholder="Código">
                                    </div>
                                    <button class="mt-5 w-50 fs-3" type="submit">Entrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
