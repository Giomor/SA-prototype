@extends('layouttemplate')
@section('content')
        <div class="card-header">
            <h2>Heritage Site Name</h2>
            <p>{{$user->name}}</p>
            <p>Date: {{$ticket->datetime}} </p>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->generate("{{$ticket->code}}") !!}
        </div>
@endsection
