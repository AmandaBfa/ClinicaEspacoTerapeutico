<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function indexPublic()
    {
        $posts = Post::latest()->paginate(3); 
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // gerando o slug automaticamente
        $post = new Post($request->all());

        $post->slug = Str::slug($request->title) . '-' . time(); 
        $post->user_id = Auth::id();
        $post->published_at = now();

        // upload da Imagem
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $post->image_url = $path;
        }

        $post->save();

        return redirect()->route('admin.blog.index')->with('success', 'Post publicado com sucesso!');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $post->image_url = $path;
        }

        $post->save();

        return redirect()->route('admin.blog.index')->with('success', 'Post atualizado com sucesso!');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        if($post->image_url){
            Storage::disk('public')->delete($post->image_url);
        }
        $post->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Post excluído com sucesso!');
    }
    
}
