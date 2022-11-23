<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); 
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $validated = $request->validate(['title'=> 'required', 'body'=>'required']);
        Post::create($validated);

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate(['title'=> 'required', 'body'=>'required']);
        $post->update($validated);

        return to_route('posts.index')->with('message', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('message', 'Post deleted');
    }
}
