@extends('layouttemplate')
@section('content')
    <a href="/heritage-sites">HOME</a>
        <div class="card-header">
            <h2>{{$heritageSite->name}}</h2>
            <p>{{$user->name}}</p>
            <p>Date: {{$ticket->datetime}} </p>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->generate("{{$ticket->code}}") !!}
        </div>
@endsection
