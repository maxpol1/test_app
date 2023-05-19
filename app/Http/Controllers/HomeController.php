<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
//        dd($post);
        return view('pages.show', compact('post'));
    }
}
