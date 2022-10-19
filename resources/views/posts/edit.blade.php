@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>   
  <div class="container-fluid">
    <div class="row">
    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
  
  <div class="mb-3">
    <label for="titulo" class="form-label">Titulo</label>
    <input type="text" name="titulo" class="form-control" id="titulo" value="{{$post->titulo}}">
  </div>

  <div class="mb-3">
    <label for="subtitulo" class="form-label">Subitulo</label>
    <input type="text" name="subtitulo" class="form-control" id="subtitulo" value="{{$post->subtitulo}}">
  </div>

  <div>
    
  <label for="categoria" class="form-label">Categoria</label>
  <select name="categoria">
    @foreach ($categories as $value)
    <option name="categoria" id="categoria" value="{{$value->nombre_cat}}">
      {{$value->nombre_cat}}</option>
    @endforeach
  </select>
  </div>

  <div class="mb-3">
    <label for="texto" class="form-label">Texto</label>
    <textarea name="texto" class="form-control" id="categoria" rows="10" cols="50">{{$post->texto}}</textarea>
  </div>

  <div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" name="foto" class="form-control" id="foto">
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control" id="name" value="{{$post->name}}">

  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
