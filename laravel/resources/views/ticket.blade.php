@extends('layouttemplate')
@section('content')
        <div class="card-header">
            <h2>Heritage Site Name</h2>
            <p>Giorgio Morico</p>
            <p>Date: {{$ticket->date}} </p>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->generate("{{$ticket->code}}") !!}
        </div>
@endsection
