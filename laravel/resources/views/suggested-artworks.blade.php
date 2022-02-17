@extends('layouttemplate')
@section('content')
    <a href="\heritage-sites">BACK</a>
        <div class="card-header">
            <h2>Artworks for you</h2>
            <p>Suggested routes based on your preferences and past visits</p>
        </div>
        <div class="card-body">
            <p>ARTWORKS LIST</p>
            <ul>
                @for($i=0;$i<count($suggestedArtworks);$i++)
                   <li> <p>{{$suggestedArtworks[$i]->id}} - {{$suggestedArtworks[$i]->name}} located in {{$suggestedArtworks[$i]->heritage_site->name}}</p></li>
                    <br>
                @endfor
            </ul>
        </div>
        <form action="{{ route('select.post') }}" method="POST">
            @csrf
        <select name="heritagesite" id="heritage-site" class="form-control">
            <option value="">Choose heritage site</option>
            @for($i=0;$i<count($heritageSites);$i++)
                <option value="{{$heritageSites[$i]->id}}" >{{$heritageSites[$i]->name}}</option>
            @endfor
        </select>
            <div class="col-md- offset-md-4">
                <button type="submit" class="btn btn-primary">
                    VIEW MAP
                </button>
            </div>
        </form>
        <br>
        <div class="card-header mx-auto w-50">

        </div>
        <div class="card-body h-100 w-50 mx-auto">
            <canvas id="canvasClick" class="border "  width="500" height="500"></canvas>
        </div>

        @csrf
        </div>


@endsection
@section('scripts')
    <script src="https://unpkg.com/mqtt@4.3.5/dist/mqtt.min.js"></script>
    <script src="{{asset('js/proximity.js')}}"></script>
    <script>canvasDraw2('{!! $uid !!}','{!! $arts !!}');</script>
    <script>clientWSListener('{!! $uid !!}',null);</script>
@endsection
