@extends('layouttemplate')
@section('content')
    <div class="card-header">
        <h2>Proximity testing tool</h2>
        
    </div>
    <div class="card-body">
            @for($i=0;$i<count($heritage_sites);$i++)
                <h3>{{$heritage_sites[$i]->name}}</h3>
                <p>{{$heritage_sites[$i]->description}}</p>
                <a href="testArtworkProximity/{{$heritage_sites[$i]->id}}">{{$heritage_sites[$i]->id}} {{$heritage_sites[$i]->name}} </a>
            @endfor
    </div>
@endsection