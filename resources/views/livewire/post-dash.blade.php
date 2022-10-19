<div>
    <div class="container-fluid">
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
            <input wire:model.lazy="query" class="form-control mr-sm-2" style="max-width:300px" type="text" placeholder="Busca un Post">
            <div>
                @include('livewire.create_posts')
              </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Subtitulo</th>
                        <th scope="col">Categoria_id</th>
                        <th scope="col">Texto</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Creado por</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Editar</th>
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
                        <td><img src="{{ Storage::url($value->foto) }}"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->created_at}}</td>
                        <td><button wire:click="edit({{$value->id}})" class="btn btn-sm btn-primary">Editar</button></td>
                        <td><button wire:click="deleteCat({{$value->id}})" class="btn btn-sm btn-danger">Borrar</button></td>
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