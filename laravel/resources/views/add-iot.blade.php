@extends('layouttemplate')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">

                            <form action="{{ route('iot.post') }}" method="POST">
                                @csrf
                                <input type="hidden" id="id" class="form-control" name="id" value="{{$heritage_site_id}}" required autofocus>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
                                    <div class="col-md-6">
                                        <input type="text" id="type" class="form-control" name="type" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>
                                    <div class="col-md-6">
                                        <input type="text" id="area" class="form-control" name="area" required autofocus>
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
