<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        //Obtener a quienes seguimos
        if (auth()->check()) {
            $ids = auth()->user()->following->pluck('id')->toArray();
            $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);
            return view('home', ['posts' => $posts]);
        } else {
            return view('home');
        }
    }
}
