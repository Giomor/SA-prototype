@extends('layouttemplate')
@section('content')
        <div class="card-header">
            <h2>Heritage Site Name</h2>
            <p>Tickets available</p>
        </div>
        <div class="card-body">
        <h3>Recommendations based on your preferences</h3>
                @for($i=0;$i<count($recommendations);$i++)
                    <p>{{$recommendations[$i]->name}}</p>
                    <p>Matches artwork: {{$recommendations[$i]->matches_count}}</p>
                    <p>Distance from the chosen museum: {{$recommendations[$i]->distance}}</p>
                    <br>
                @endfor

        </div>
@endsection
