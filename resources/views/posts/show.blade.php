@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="pull-left">
        <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
      </div>
      <div>
        <h1>Titulo: {{$posts->titulo}}</h1>
        <h4>Subtitulo: {{$posts->subtitulo}}</h4>
        <p>Categoria: {{$posts->categoria_id}}</p>
        <p>{{$posts->texto}}</p>
        <br><br>
        <img height="150px" width="auto" src="{{ Storage::url($posts->foto)}}">
        <br><br>
        <p>Creado por: {{$posts->name}}</p>
        <p>Creado: {{$posts->created_at}}</p>
        <p>Editado: {{$posts->updated_at}}</p>
      </div>
      {{-- <form action="{{ route('posts.destroy', $posts->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Borrar</button>
      </form>  --}}
       {{-- <div>
      <a class="btn btn-primary" href="{{ route('posts.edit',$posts->id) }}">Editar</a>
      </div> --}}
    </div> 
  </div>
@endsection
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>