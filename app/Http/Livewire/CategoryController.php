<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Category;
use Livewire\Component;

class CategoryController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $query = '';
    public $category;
    public $nombre_cat;
    public $slug;

    protected $rules = [
        'category.nombre_cat' => 'required',
        'category.slug' => 'required',
    ];

    protected $message = [
        'category.nombre_cat.required' => 'Es necesario el nombre de la Categoria',
        'category.slug.required' => 'Es necesario un Slug',
    ];


    public function mount()
    {
        $this->category = new Category();
        $categories = Category::select('*')->get();
        $query;
    }
    public function render()
    {
        $categories = Category::select();
        if ($this->query) {
        //dd($this->query);
                 $categories = Category::select('*')->where('nombre_cat', 'like', '%' . $this->query . '%');
        }
        return view('livewire.category-controller', [
            'categories' => $categories->paginate(4),
            'query' => $this->query
        ]);
    }

    public function storeCat()
    {
        try {
            $this->validate();
            $category = Category::create([
            'nombre_cat' => $this->category->nombre_cat,
            'slug' => $this->category->slug
            ]);
            $this->resetInputs();
            return redirect()->to('/categories')->with('message', 'CATEGORIA CREADA CON EXITO!');
        } catch (Exeption $e) {
            dd($e);
        }
    }
    public function editData($id)
    {
        $this->category = Category::find($id);
        $this->dispatchBrowserEvent('openModal');
    }



    public function edit()
    {
        // dd(1);
        $this->category->save();
        $this->resetInputs();
        $this->dispatchBrowserEvent('closeModal');
        return redirect()->with('message', 'CATEGORIA EDITADA CON EXITO!');
    }

    public function resetInputs()
    {
        $this->category = new Category();
    }
    public function delete($id)
    {
        Category::find($id)->delete($id);
        return redirect()->with('message', 'CATEGORIA BORRADA CON EXITO!');
    }
}
