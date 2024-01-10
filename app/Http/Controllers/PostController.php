<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function home_redirect()
    {
        return redirect('/');
    }

    public function index ()
    {
        return view('blog.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'user_id', 'author']))->simplePaginate(3)->withQueryString()
        ]);
    }

    public function show (Post $post)
    {
        return view('blog.show', [
            'post' => $post
        ]);
    }

    public function category (Category $category)
    {
        return view('blog.index', [
            'posts' => $category->posts,
        ]);
    }

    public function author (User $author)
    {
        return view('blog.index', [
            'posts' => $author->posts,
        ]);
    }
 }
