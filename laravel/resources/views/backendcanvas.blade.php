@extends('layouttemplate')
@section('content')
    <div class="card-header mx-auto w-50">
        
    </div>
    <div class="card-body h-100 w-50 mx-auto">
        <canvas id="canvasClick" class="border "  width="500" height="500"></canvas>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/mqtt@4.3.5/dist/mqtt.min.js"></script>
    <script src="{{asset('js/backendCanvas.js')}}"></script>
    <script>canvasDraw('{!! $uid !!}','{!! $IoT !!}');</script>
@endsection