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
                <a href="/recommended-museums/{{$heritage_sites[$i]->id}}">Show Tickets</a>
            @endfor
    </div>
@endsection