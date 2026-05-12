<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::paginate(15);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $post->field ?? ''
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    public function store(CreatePostRequest $request)
    {
        Post::create($request->validated());
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}