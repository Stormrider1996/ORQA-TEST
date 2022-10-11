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
        <h1 style="padding: 10px">Files</h1>
        <h5 style="padding: 10px">Upload & download your files</h5>
        <a href="/NewFile" type="button" class="btn btn-primary" style="margin-left: 10px">New File</a>
    </div>
    <table class="table" style="margin:50px auto auto; width: 1000px">
        <thead>
          <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Added</th>
            <th scope="col">Size</th>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
            {{-- @foreach ($collection as $item)
                
            @endforeach --}}
        </tbody>
      </table>
</body>
</html>
@endsection
