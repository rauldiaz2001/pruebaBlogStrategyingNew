<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class CarrousselPost extends Component
{
    public function render()
    {
        $posts = Post::all();
        return view('livewire.carroussel-post', [
            'posts' => $posts
        ]);
    }
}
