<div>
    <div class="container">
        <div class="row">
          <div class="text-left">
            <div>
              @include('livewire.create-posts')
            </div>
            <br>
            <input wire:model.lazy="query" class="form-control mr-sm-2" style="max-width:300px" type="text" placeholder="Busca un Posts">
            <br>
          </div>
            
    
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif
            <table class="table">
                <thead>
                    <tr>
                        <th wire:click="sort('id')" role="button" scope="col">ID</th>
                        <th wire:click="sort('titulo')" role="button" scope="col">Titulo</th>
                        <th wire:click="sort('subtitulo')" role="button" scope="col">Subtitulo</th>
                        <th wire:click="sort('categoria_id')" role="button" scope="col">Categoria_id</th>
                        <th wire:click="sort('texto')" role="button" scope="col">Texto</th>
                        <th scope="col">Foto</th>
                        <th wire:click="sort('name')" role="button" scope="col">Creado por</th>
                        <th wire:click="sort('created_at')" role="button" scope="col">Creado</th>
                        <th  scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                @foreach ($posts as $value)
                <tbody>
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->titulo}}</td>
                        <td>{{$value->subtitulo}}</td>
                        <td>{{$value->categoria_id}}</td>
                        <td>{{$value->texto}}</td>
                        <td><img src="{{ Storage::url($value->foto) }}" height="50px" width="50px"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->created_at}}</td>
                        <td><button  wire:click="editData('{{$value->id}}')" class="btn btn-sm btn-primary">Editar</button></td>
                        <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  @include('livewire.update-posts')
                                </div>
                                
                              </div>
                            </div>
                          </div>
                        <td><button wire:click="delete({{$value->id}})" class="btn btn-sm btn-danger">Borrar</button></td>
                        <td></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="d-flex">
            {{ $posts->links() }}
        </div> 
    </div>
</div>
@push('js')
<script type="text/javascript">
window.addEventListener('openModal', ()=> {
    console.log('hello');
    $('#edit').modal('show');
});
</script>
<script>
  window.addEventListener('closeModal', ()=> {
    console.log('entra');
    $('#edit').modal('hide');
});
</script>
@endpush