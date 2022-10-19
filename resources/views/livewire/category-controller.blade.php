<div>
  <div class="container">
    <div class="row">
      <div class="text-right">
        <div>
          @include('livewire.category-create')
        </div>
        <br>
        <input wire:model.lazy="query" class="form-control mr-sm-2" style="max-width:300px" type="text"
          placeholder="Busca una Categoria">
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
            <th scope="col">ID</th>
            <th scope="col">Categoria</th>
            <th scope="col">Slug</th>
            <th scope="col">Creado</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
          </tr>
        </thead>
        @foreach ($categories as $value)
        <tbody>
          <tr>
            <th scope="row">{{$value->id}}</th>
            <td>{{$value->nombre_cat}}</td>
            <td>{{$value->slug}}</td>
            <td>{{$value->created_at}}</td>
            <td><button wire:click="editData({{$value->id}})" class="btn btn-sm btn-primary">Editar</button></td>
            <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @include('livewire.update-categories')
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
      {{ $categories->links() }}
    </div>
  </div>
</div>
@push('js')
<script type="text/javascript">
  window.addEventListener('openModal', ()=> {
    console.log('hello');
    $('#edit').modal('show');
});
window.addEventListener('closeModal', ()=> {
    console.log('entra');
    $('#edit').modal('hide');
});
</script>
@endpush