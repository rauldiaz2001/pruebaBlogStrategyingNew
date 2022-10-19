<div>
    <form wire:submit.prevent="edit">
        <div class="mb-3">
          <label for="nombre_cat" class="form-label">Nombre Categoria</label>
          <input type="text" wire:model="category.nombre_cat" class="form-control" id="nombre_cat">
          @error('nombre_cat') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" wire:model="category.slug" class="form-control" id="slug">
          @error('category.slug') <span class="error">{{ $message }}</span> @enderror

        </div>
        
      @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
        <button type="submit" class="btn btn-primary">Submit</button>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        </div>
      </form>

</div>