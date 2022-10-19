<div>
  <div class="container">
    <div class="row">
      <div class="text-left">
        <input wire:model.lazy="query" type="text" placeholder="Busca un post">
        <select wire:model="category_id">
          <option value="">Seleciona una categoria</option>
          @foreach($categories as $value)
          <option value="{{$value->id}}">{{$value->nombre_cat}}</option>
          @endforeach
        </select>
      </div>
      

      <div>
        @foreach ($posts as $value)
        <div class="col" style="display: flex;
          align-items: center;
          justify-content: center;">
          <div class="card" style="width: 18rem;">
            <img src="{{ Storage::url($value->foto) }}">
            <div class="card-body">
              <h5 class="card-title">{{$value->titulo}}</h5>
              <p class="card-text">{{$value->subtitulo}}</p>
              <h5 class="card-title">{{$value->name}}</h5>
              <a href="{{ route('posts.show',$value->id) }}" class="btn btn-primary" value="{{$value->id}}">Leer Más</a>
              <p class="card-text">{{$value->created_at}}</p>
            </div>
          </div>
        </div>
        <br>
        @endforeach
      </div>
      <div class="d-flex">
        {{ $posts->links() }}
       </div>

    </div>
  </div>
</div>