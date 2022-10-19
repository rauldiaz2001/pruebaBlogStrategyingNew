<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Category;

class CrudPost extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id = '';
    public $post;
    public $foto = null;
    public $sort = 'id';
    public $typeSort = 'asc';


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
        return view('livewire.crud-post', [
            'posts' => $posts->orderBy($this->sort, $this->typeSort)->paginate(5),
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
            $this->resetInputs();
            return redirect()->to('crud/post')->with('message', 'POST CREADO CON EXITO!');
        } catch (Exception $e) {
            dd($e);
        }
        return redirect()->with('message', 'ERROR AL CREAR EL POST');
    }
    public function sort($sortBy)
    {
        if ($sortBy == $this->sort) {
            $this->typeSort = $this->typeSort == 'desc' ? 'asc' : 'desc';
        } else if ($sortBy == 'category') {
            $this->sort = 'category_id';
            $this->typeSort = $this->typeSort == 'desc' ? 'asc' : 'desc';
        } else {
            $this->typeSort = 'asc';
            $this->sort = $sortBy;
        }
    }

    public function editData($id)
    {
        $this->post = Post::find($id);
        $this->dispatchBrowserEvent('openModal');
    }



    public function edit()
    {
        // if exists save else not save
        // dd(1);
        if ($this->foto) {
            $path = $this->foto->store('pictures', 'public');
            // $imgPath = $this->post->foto->store('pictures', 'public');
            $this->post->foto = $path;
        }
        $this->post->save();
        $this->dispatchBrowserEvent('closeModal');
        $this->resetInputs();
        return redirect()->with('message', 'POST EDITADO CON EXITO!');
    }

    public function show($id)
    {
        $this->post = Post::find($id);
    }
    public function delete($id)
    {
        Post::find($id)->delete($id);
        return redirect()->with('message', 'POST BORRADO CON EXITO!');
    }

    public function resetInputs()
    {
        $this->post = new Post();
        $this->foto = ' ';
    }
}
