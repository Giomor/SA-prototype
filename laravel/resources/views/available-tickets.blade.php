@extends('layouttemplate')
@section('content')
    <div class="card-header">
        <h2>{{$heritageSite->name}}</h2>
        <p>Tickets available</p>
    </div>
    <div class="card-body">
        @if(!$tickets->isEmpty())
            @for($i=0;$i<count($tickets);$i++)
                <p>{{$tickets[$i]->datetime}}</p>
                <a href="/generate-qrcode/{{$tickets[$i]->id}}">Buy Ticket</a>
            @endfor
        @else
            <p>There are no tickets available</p>
            <a href="/recommended-museums/{{$heritageSite->id}}">Check recommended museums based on your preferences</a>
        @endif
    </div>
@endsection
