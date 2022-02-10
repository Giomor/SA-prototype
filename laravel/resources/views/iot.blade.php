@extends('layouttemplate')
@section('content')
    <div class="card-header">
        <h2>Heritage Site Name</h2>
        <p>Tickets available</p>
    </div>
    <div class="card-body">
            @foreach($heritage_sites as $site)
                <h3>{{$site->name}}</h3>
                <a href="/backend/add-iot/{{$site->id}}">ADD IoT Component</a>
                <br>
                <ul>
                @foreach($iot as $elem)
                    @if($elem->heritage_site_id == $site->id)
                        <li>
                            <p>Name: {{$elem->name}}</p>
                            <p>Type: {{$elem->type}}</p>
                            <p>Area: {{$elem->area}}</p>
                        </li>
                        <a href="/backend/edit-iot/{{$elem->id}}">EDIT</a>
                            <form action="{{ route('deleteIot') }}" method="POST">
                                @csrf
                                <input type="hidden" id="id" class="form-control" name="id" value="{{$elem->id}}" required autofocus>
                                <button type="submit" class="btn btn-danger">
                                    DELETE
                                </button>
                            </form>
                    @endif
                @endforeach
                </ul>
            @endforeach
    </div>
@endsection
