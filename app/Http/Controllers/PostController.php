<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Middleware\ValidadorPosts;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(ValidadorPosts::class);
    }

    public function dash()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(2);
          return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
          ]);
    }
    public function index()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(2);
          return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
          ]);
        //  $category = Category::all();
        //  $posts = Post::latest()->paginate(2);
        //  return view('posts.index', compact('posts, categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                 'titulo' => 'required',
                 'subtitulo' => 'required',
                 'texto' => 'required'
             ]
        );
        if ($validator->fails()) {
                 return response([
                   'errors' => $validator->errors(),
                   'body' => $request->all(),
                 ], 400);
        }
        $post = new Post();
        $categories = Category::all();
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->categoria_id = $request->categoria_id;
        $post->texto = $request->texto;
        $post->foto = $request->file('foto')->store('pictures', 'public');
        $post->name = $request->name;
        $post->save();
        return redirect()->route('posts.index')
        ->with('success', 'Post created successfully');
    }

    public function create()
    {
        $category = Category::all();
        return view('posts.create', compact('category'));
        // return view('posts.create');
    }
/**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($posts)
    {
        return view('posts.show', [
            'posts' => Post::where('id', $posts)->first(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $input = $request->all();
        $input["foto"] = $request->file('foto')->store('pictures', 'public');
        $post->fill($input)->save();
        return view('posts.update', compact('post'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        $post->with('category')->find($post);
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
        ->with('success', 'Post deleted successfully');
    }
}
