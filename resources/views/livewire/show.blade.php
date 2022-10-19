<div>
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
            <div>
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditModal">
    Editar
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include('livewire.update-posts')
        </div>
      </div>
    </div>
  </div>
        </div> 
      </div>
</div>