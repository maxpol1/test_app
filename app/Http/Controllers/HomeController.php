<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()->paginate(5);
        return view('pages.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::query()->where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('post'));
    }

    public function tag($slug)
    {
        $tag = Tag::query()->where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->paginate(3);
        return view('pages.list', compact('posts'));

    }

    public function category($slug)
    {
        $category = Category::query()->where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(4);
        return view('pages.list', compact('posts'));
    }
}
