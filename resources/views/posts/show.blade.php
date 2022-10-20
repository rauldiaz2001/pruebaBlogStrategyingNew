@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
  <div class="container">
    <div class="row">
      <div class="text-left">
        <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
      </div>
      <br><br>
      <div class="col-12">
        @livewire('carroussel-post')
      
      </div>
      <div class="col-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">{{$posts->subtitulo}}</h3>
        <article class="blog-post">
          <h2 class="blog-post-title">{{$posts->titulo}}</h2>
          <p class="blog-post-meta">{{$posts->created_at}} by: {{$posts->name}}</p>
          <hr>
          <p>{{$posts->texto}}</p>
          <img height="150px" width="auto" src="{{ Storage::url($posts->foto)}}">
        </article>
      </div>
      <div class="col-4">
        <div class="position-sticky">
          <div class="p-4">
            <h4 class="fst-italic">All Categories</h4>
            @livewire('category-list')
          </div>
          <div class="p-4">
            <h4 class="fst-italic">Handmade</h4>
            <ul>
              @foreach($categories as $value)
              <li><a style="cursor:pointer;" wire:click="categoria">{{$value->nombre_cat}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      

    </div> 
  </div>
@endsection
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>