@extends('layouttemplate')
@section('content')
    <div class="card-header">
        <h2>Heritage Site Name</h2>
        <p>Tickets available</p>
    </div>
    <div class="card-body">
        @if(!$tickets->isEmpty())
            @for($i=0;$i<count($tickets);$i++)
                <p>{{$tickets[$i]->datetime}}</p>
                <a href="/generate-qrcode">Buy Ticket</a>
            @endfor
        @else
            <p>There are no tickets available</p>
            <a href="/recommended-museums/{{$heritage_site_id}}">Check recommended museums based on your preferences</a>
        @endif
    </div>
@endsection
