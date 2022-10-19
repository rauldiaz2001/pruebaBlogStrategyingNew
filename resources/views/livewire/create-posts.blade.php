<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CreateModal">
        Crear Nuevo Post </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input type="text" wire:model="post.titulo" class="form-control" id="titulo">
                            @error('post.titulo') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subtitulo" class="form-label">Subitulo</label>
                            <input type="text" wire:model="post.subtitulo" class="form-control" id="subtitulo">
                            @error('post.subtitulo') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="categoria_id" class="form-label">Categoria</label>
                            <select name="categoria_id" wire:model="post.categoria_id">
                                @foreach ($categories as $value)
                                <option value="{{$value->id}}">
                                    {{$value->nombre_cat}}
                                </option>
                                @endforeach
                            </select>
                            @error('post.categoria_id') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="texto" class="form-label">Texto</label>
                            <textarea wire:model="post.texto" class="form-control" id="categoria" rows="10"
                                cols="50"></textarea>
                                @error('post.texto') <span class="error">{{ $message }}</span> @enderror
                        </div>


                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" wire:model="foto" class="form-control" id="foto">
                            <div wire:loading wire:target="photo">Uploading...</div>
                            @error('post.foto') <span class="error">{{ $message }}</span> @enderror
                        </div>


                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" wire:model="post.name" class="form-control" id="name">
                            @error('post.name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

