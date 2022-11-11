@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="container-fluid m-5 mt-2 p-3">
        <div class="row">
            <div class="col p-5 text-center">
                @livewire('escuchar')
            </div>
        </div>
    </div>
</div>
@stop