<div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-left">
          <input wire:model.lazy="query" type="text" placeholder="Busca un post">
          <select wire:model="category_id">
            <option value="">Seleciona una categoria</option>
            @foreach($categories as $value)
            <option value="{{$value->id}}">{{$value->nombre_cat}}</option>
            @endforeach
          </select>
        </div>
      </div>
      
      

      <div class="row">
        @foreach ($posts as $value)
        <div class="col-12 col-md-4 d-flex align-items-stretch" style="justify-content: center;margin-top:40px; margin-bottom:40px;">
          <div class="card" style="width: 18rem;">
            <img style="max-width:286px; min-width:286px; max-height:200px; min-height:200; border-radius: 1%;"src="{{ Storage::url($value->foto) }}">
            <div class="card-body">
              <h5 class="card-title">{{$value->titulo}}</h5>
              <p class="card-text">{{$value->subtitulo}}</p>
              <h5 class="card-title">{{$value->name}}</h5>
              <a href="{{ route('posts.show',$value->id) }}" class="btn btn-primary" value="{{$value->id}}">Leer Más</a>
              <p class="card-text">{{$value->created_at}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="d-flex">
        {{ $posts->links() }}
       </div>

    </div>
  </div>
</div>