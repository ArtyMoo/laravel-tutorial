<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index ()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/')->with('success', 'Your post has been successfully published!');
    }

    public function edit(Post $post) //edit the post associated with the URI
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update (Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required|string|max:255',
           // 'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        Post::where('id', $post->id)->update([
            'title' => $attributes['title'],
            'slug' => $attributes['slug'],
            'excerpt' => $attributes['excerpt'],
            'body' => $attributes['body'],
            'category_id' => $attributes['category_id']
        ]);

        return redirect('/' . $attributes['slug'])->with('success', 'Your post has been updated!');
    }

    public function destroy (Post $post)
    {
        $post->delete();

        return redirect('/')->with('success', 'Your post has been deleted!');
    }
}
