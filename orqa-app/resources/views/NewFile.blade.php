@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="margin-left: 100px; margin-top: 10px;"> 
        <h1 style="padding: 10px">New File</h1>
        <h5 style="padding: 10px">Upload a new file</h5>
        <a href="/" type="button" class="btn btn-primary" style="margin-left: 10px">All files</a>
    </div>
    <form method="POST" action="/file" enctype="multipart/form-data">
        @csrf
        <div>
            <input class="form-control form-control-lg" id="formFileLg" type="file" style="margin-top: 50px; margin-left: 100px; width: 500px;" name="file" />
            @error('file')
                <p style="margin-left: 100px; margin-top: 10px; color:red"  >{{$message}}</p>
            @enderror
            <button type="submit" class="btn btn-primary" style="margin-top: 25px; margin-left: 100px">Upload</button>
        </div>
    </form>
</body>
</html>
@endsection
