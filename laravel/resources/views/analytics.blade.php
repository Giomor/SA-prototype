@extends('layouttemplate')
@section('content')
    <div class="card-header">
        <h2>Analytics</h2>
        <p>Extracted time spent by users in proximity of every artwork</p>
    </div>
    <div class="card-body">
        @for($i=0;$i<count($analytics);$i++)
            @if($i == 0 || ($i>0 && $analytics[$i]->artwork_id != $analytics[$i-1]->artwork_id))
                <h3>Artwork: {{$analytics[$i]->artwork->name}}</h3>
            @endif
                <p>User: {{$analytics[$i]->user->name}}, Date: {{$analytics[$i]->date}}, Time spent: {{$analytics[$i]->time}}</p>
        @endfor
    </div>
@endsection
