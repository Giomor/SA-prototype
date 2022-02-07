<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Generate QR Code Examples</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Heritage Site Name</h2>
            <p>Tickets available</p>
        </div>
        <div class="card-body">
            @if(!$tickets->isEmpty())
                @for($i=0;$i<count($tickets);$i++)
                    <p>{{$tickets[$i]->datetime}}</p>
                @endfor
            @else
                <p>There are no tickets available</p>
                <a href="/recommended-museums/{{$heritage_site_id}}">Check recommended museums based on your preferences</a>
            @endif
        </div>
    </div>
   <!-- <div class="card">
        <div class="card-header">
            <h2>Color QR Code</h2>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('RemoteStack') !!}
        </div>
    </div>-->
</div>
</body>
</html>
