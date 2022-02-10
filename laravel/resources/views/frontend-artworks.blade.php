@extends('layouttemplate')
@section('content')
    <div class="card-header">
        <h2>Heritage Site Name</h2>
        <p>Tickets available</p>
    </div>
    <div class="card-body">

        @foreach($artworks as $elem)
            <p>Name: {{$elem->name}}</p>
            <p>Description: {{$elem->description}}</p>
            <form action="{{ route('addFavorite') }}" method="POST">
                @csrf
                <input type="hidden" id="id" class="form-control" name="id" value="{{$elem->id}}" required autofocus>
                <button type="submit" class="btn btn-primary">
                    ADD TO FAVORITE
                </button>
            </form>
        @endforeach
    </div>
@endsection
