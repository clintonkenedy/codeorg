@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="container bg-light mt-5 rounded-5 p-3">
        <div class="row">
            <div class="col text-center">
                <h2>Ranking</h2>
                @livewire('lista-ranking')
                <hr>
            </div>
        </div>
        <div class="row p-3">
            @livewire('escuchar')
        </div>
    </div>
</div>
@stop