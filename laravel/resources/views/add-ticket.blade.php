@extends('layouttemplate')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Ticket</div>
                        <div class="card-body">

                            <form action="{{ route('ticket.post') }}" method="POST">
                                @csrf
                                <!--<input type="hidden" id="id" class="form-control" name="id" value="{{$heritage_site_id}}" required autofocus>-->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name and Surname</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>
                                    <br>
                                    <select name="ticket" id="ticket" class="form-control">
                                        <option value="">Choose ticket</option>
                                        @for($i=0;$i<count($tickets);$i++)

                                            <option value="{{$tickets[$i]->id}}" >{{$tickets[$i]->datetime}}</option>
                                        @endfor
                                    </select>
<br>
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
