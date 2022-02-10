@extends('layouttemplate')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">ADD ARTWORK</div>
                        <div class="card-body">

                            <form action="{{ route('artwork.post') }}" method="POST" id="artworkform">
                                @csrf
                                <input type="hidden" id="id" class="form-control" name="id" value="{{$heritage_site_id}}" required autofocus>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                    <div class="col-md-6">
                                       <textarea id="description" rows="4" cols="50" name="description" form="artworkform"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        ADD
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
