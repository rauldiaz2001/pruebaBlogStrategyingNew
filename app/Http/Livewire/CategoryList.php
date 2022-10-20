<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    public $category;
    public $nombre_cat;
    public $slug;

    public function mount()
    {
        $this->category = new Category();
        $categories = Category::all();
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-list', [
            'categories' => $categories
        ]);
    }
}
