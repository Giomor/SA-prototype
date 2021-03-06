@extends('layouttemplate')
@section('content')
    <div class="card-header">
        <h2>Heritage Site Name</h2>
        <p>Tickets available</p>
    </div>
    <div class="card-body">
            @for($i=0;$i<count($heritage_sites);$i++)
                <h3>{{$heritage_sites[$i]->name}}</h3>
                <p>{{$heritage_sites[$i]->description}}</p>
                <!--<a href="/recommended-museums/{{$heritage_sites[$i]->id}}">Show Tickets</a>-->
                <a href="/available-tickets/{{$heritage_sites[$i]->id}}">Show Tickets</a>
            <br>
            <a href="/artworks/{{$heritage_sites[$i]->id}}">Show Artworks</a>
            @endfor
    </div>
    <div class="card-body">
        <a href="/suggest-routes">See suggested route</a>
    </div>
@endsection
