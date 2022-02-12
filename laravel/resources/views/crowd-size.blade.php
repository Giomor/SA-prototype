@extends('layouttemplate')
@section('content')
    <div class="card-header">
        <h2>Crowd Size</h2>
        <p>Checking crowd inside the museums</p>
    </div>
    <div class="card-body">
            @foreach($crowdSize as $s)
                <h3>{{$s->name}}</h3>
                <p>CURRENT CROWD INSIDE: {{$s->crowd_inside}}</p>
            @endforeach
    </div>
@endsection
