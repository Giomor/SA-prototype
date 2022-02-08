@extends('layouttemplate')
@section('content')
    <div class="card-header mx-auto w-100">
        {{$IoT}}
    </div>
    <div class="card-body h-100 w-100 mx-auto">
        <canvas id="canvasClick" class="container-fluid w-100 h-100 border border-success"></canvas>
    </div>
    <div id="idCoord"></div>
@endsection
@section('scripts')
    <script src="{{asset('js/proximity.js')}}"></script>
    <script>canvasDraw('{!! $IoT !!}');</script>
@endsection