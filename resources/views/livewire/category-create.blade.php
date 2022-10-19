<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
        Crear Categoria
    </button>

    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                    <div class="container-fluid">
                      <div class="row">
                        <div class="pull-right">
                          <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
                        </div>
                        <br>
                        <form wire:submit.prevent="storeCat" method="post">
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
                         
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>