@extends('layouttemplate')
@section('content')
        <div class="card-header">
            <h2>Artworks for you</h2>
            <p>Suggested routes based on your preferences and past visits</p>
        </div>
        <div class="card-body">
            <p>ARTWORKS LIST</p>
            <ol>
                @for($i=0;$i<count($suggestedArtworks);$i++)
                   <li> <p>{{$suggestedArtworks[$i]->name}} located in {{$suggestedArtworks[$i]->heritage_site->name}}</p></li>
                    <br>
                @endfor
            </ol>
        </div>
@endsection
