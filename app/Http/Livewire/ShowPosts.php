<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Category;

class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id = '';
    public $post;
    public $foto = null;

    protected $rules = [
        'post.titulo' => 'required',
        'post.subtitulo' => 'required',
        'post.categoria_id' => 'required',
        'post.texto' => 'required',
        'foto' => 'max:2048',
        'post.name' => 'required',
    ];

    protected $message = [
        'post.titulo.required' => 'Es necesario un titulo',
        'post.subtitulo.required' => 'Es necesario un subtitulo',
        'post.foto.required' => 'Es necesario una imagen',
        'post.texto.required' => 'Es necesario un contenido',
        'post.categoria_id.required' => 'Es necesario una categoria',
        'post.name.required' => 'Es necesario una nombre',
    ];


    public $query = '';

    public function mount()
    {
        $this->post = new Post();
        $categories = Category::select('*')->get();
        $posts = Post::select('*')->get();
        $query;
    }

    public function render()
    {
        $categories = Category::select()->get();
        $posts = Post::select('*');
        if ($this->category_id) {
                //dd($this->category_id);
                $posts = Post::select('*')->where('categoria_id', $this->category_id);
        }
        if ($this->query) {
            //dd($this->query);
                     $posts = Post::select('*')->where('titulo', 'like', '%' . $this->query . '%');
        }
        return view('livewire.show-posts', [
            'posts' => $posts->paginate(2),
            'categories' => $categories,
            'query' => $this->query
        ]);
    }

    public function store()
    {
        try {
            $this->validate();
            $path = $this->foto->store('pictures', 'public');
            // $imgPath = $this->post->foto->store('pictures', 'public');

            $post = Post::create([
            'titulo' => $this->post->titulo,
            'subtitulo' => $this->post->subtitulo,
            'categoria_id' => $this->post->categoria_id,
            'texto' => $this->post->texto,
            'foto' => $path,
            'name' => $this->post->name
            ]);
            return redirect()->with('message', 'POST CREADO CON EXITO!');
        } catch (Exception $e) {
            dd($e);
        }
    }


    public function edit($id)
    {
        dd(1);
        $this->post = Post::find($id);
        $path = $this->foto->store('pictures', 'public');
            // $imgPath = $this->post->foto->store('pictures', 'public');
            $posts = Post::where('id', $this->id)->first();
            $posts->titulo = $this->titulo;
            $posts->subtitulo = $this->subtitulo;
            $posts->categoria_id = $this->categoria_id;
            $posts->texto = $this->texto;
            $posts->foto = $this->path;
            $posts->name = $this->name;
        $this->post->save();
    }
    public function show($id)
    {
        //dd($id);
        $this->post = Post::find($id);
        //dd($this->post);
    }
}
