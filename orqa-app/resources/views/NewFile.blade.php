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
    <div>
        <input class="form-control form-control-lg" id="formFileLg" type="file" style="margin-top: 50px; margin-left: 100px; width: 500px;" >
    </div>
</body>
</html>
@endsection
