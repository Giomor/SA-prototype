@extends('layouttemplate')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">

                            <form action="{{ route('editArtwork.post') }}" method="POST" id="artworkform">
                                @csrf
                                <input type="hidden" id="id" class="form-control" name="id" value="{{$artwork->id}}" required autofocus>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" value="{{$artwork->name}}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description"
                                           class="col-md-4 col-form-label text-md-right">Description</label>
                                    <div class="col-md-6">
                                        <textarea id="description" rows="4" cols="50" name="description"
                                                  form="artworkform">{{$artwork->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                    <div class="col-md-6">
                                        <input type="file"
                                               id="image" name="image"
                                               accept="image/png, image/jpeg">
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        EDIT
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
