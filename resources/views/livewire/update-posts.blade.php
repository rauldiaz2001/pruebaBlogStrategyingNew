<div>
    <div class="container-fluid">
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
            {{-- @dd("helllo"); --}}
            <form enctype="multipart/form-data">
                

                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" wire:model="post.titulo" class="form-control" id="titulo" value="{{$post->titulo}}">
                </div>

                <div class="mb-3">
                    <label for="subtitulo" class="form-label">Subitulo</label>
                    <input type="text" wire:model="post.subtitulo" class="form-control" id="subtitulo"
                        value="{{$post->subtitulo}}">
                </div>

                <div>

                    <label for="categoria" class="form-label">Categoria</label>
                    <select name="categoria">
                        @foreach ($categories as $value)
                        <option wire:model="post.categoria" id="categoria" value="{{$value->nombre_cat}}">
                            {{$value->nombre_cat}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="texto" class="form-label">Texto</label>
                    <textarea wire:model="post.texto" class="form-control" id="categoria" rows="10"
                        cols="50">{{$post->texto}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" wire:model="foto" class="form-control" id="foto">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" wire:model="post.name" class="form-control" id="name" value="{{$post->name}}">

                </div>
                

                <button  wire:click.prevent="edit" class="btn btn-primary">Submit</button>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            </form>
        </div>
    </div>
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
</div>