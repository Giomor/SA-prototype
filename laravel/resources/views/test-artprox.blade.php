@extends('layouttemplate')
@section('content')
    <div class="card-header mx-auto w-100">
        
    </div>
    <div class="card-body h-100 w-100 mx-auto">
        <canvas id="canvasClick" class="border "  width="500" height="500"></canvas>
    </div>
    <div id="idCoord"></div>
@endsection
@section('scripts')
    
    <script src="{{asset('js/proximity.js')}}"></script>
    <script>canvasDraw('{!! $IoT !!}');</script>
@endsection