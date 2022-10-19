<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
    //     foreach (Category::all() as $category) {
    //         $category->post;
    //   }

    //   return view('categories.index', compact('categories'));ç
        $category = Category::all();
        return view('categories.index', compact('category'));
    }

    public function create()
    {
         return view('categories.create');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->nombre_cat = $request->nombre_cat;
        $category->slug = $request->slug;
        $category->save();
        return redirect()->route('posts.index');
    }

    public function show(Category $category)
    {
        $category->post;
         return view('categories.show', compact('categories'));
    }

    public function update(Request $request, Category $category)
    {
        $category->fill($request->all())->save();
        return view('categories.update', compact('categories'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('posts.index')
        ->with('success', 'Post deleted successfully');
    }
}
