@extends('layouttemplate')
@section('content')
    <a href="\heritage-sites">BACK</a>
    <div class="card-header">
        <h2>{{$heritageSite->name}}</h2>
        <p>Artworks</p>
    </div>
    <div class="card-body">

        @for($i = 0; $i<count($artworks); $i++)
            @if($artworks[$i]->heritage_site_id == $heritageSite->id)
                <p>Name: {{$artworks[$i]->name}}</p>
                <p>Description: {{$artworks[$i]->description}}</p>
                @if(!$artworks[$i]->isFavorite())
                    <form action="{{ route('addFavorite') }}" method="POST">
                        @csrf
                        <input type="hidden" id="id" class="form-control" name="id"
                               value="{{$artworks[$i]->id}}" required autofocus>
                        <button type="submit" class="btn btn-primary">
                            ADD TO FAVORITE
                        </button>
                    </form>
                @else
                    <form action="{{ route('removeFavorite') }}" method="POST">
                        @csrf
                        <input type="hidden" id="id" class="form-control" name="id"
                               value="{{$artworks[$i]->id}}"
                               required autofocus>
                        <button type="submit" class="btn btn-danger">
                            REMOVE FROM FAVORITE
                        </button>
                    </form>
                @endif
            @endif
        @endfor


    </div>
@endsection
