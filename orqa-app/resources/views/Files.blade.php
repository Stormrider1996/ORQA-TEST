@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="/newFile" type="button" class="btn btn-primary" style="margin-left: 10px">New File</a>
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
            @foreach ($files as $file)
                <tr>
                  <td>
                    @if ($file->fileExtension == "pdf")
                      <i class="fa fa-file-pdf-o" style="font-size: 25px"></i>
                    @elseif (	$file->fileExtension == "jpeg" || $file->fileExtension == "jpg" || $file->fileExtension == "png" || $file->fileExtension == "gif" )
                      <i class="fa fa-file-photo-o" style="font-size: 25px"></i>
                    @elseif (	$file->fileExtension == "mp3")
                      <i class="fa fa-file-audio-o" style="font-size: 25px"></i>
                    @elseif (	$file->fileExtension == "mp4")
                      <i class="fa fa-file-video-o" style="font-size: 25px"></i>
                    @elseif (	$file->fileExtension == "txt")
                      <i class="fa fa-file-text-o" style="font-size: 25px"></i>
                    @elseif (	$file->fileExtension == "docx")
                      <i class="fa fa-file-word-o" style="font-size: 25px"></i>
                    @elseif (	$file->fileExtension == "ppt")
                      <i class="fa fa-file-powerpoint-o" style="font-size: 25px"></i>
                    @elseif (	$file->fileExtension == "xls")
                      <i class="fa fa-file-excel-o" style="font-size: 25px"></i>
                    @elseif (	$file->fileExtension == "zip" || $file->fileExtension == "rar")
                      <i class="fa fa-file-zip-o" style="font-size: 25px"></i>
                    @else
                      <i class="fa fa-file" style="font-size: 25px"></i>
                    @endif
                  </td>
                  <td>{{$file->fileName}}</td>
                  <td>{{$file->created_at}}</td>
                  <td>{{$file->fileSize." MB"}}</td>
                  <td>
                    <form action="/files/{{$file->id}}" method="GET" style="display: inline">
                      @csrf
                      <button type="submit" class="btn btn-primary" ><i class="fa fa-download"></i></button>
                    </form>
                    <form action="/files/{{$file->id}}" method="POST" style="display: inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
        <div style="float: right; margin-right: 400px; margin-top: 25px;">
          {{$files->links()}}
        </div>
    </body>
</html>
@endsection
