<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
       $posts= Post::all();
       return view('posts.index',[
        'posts' => $posts
       ]);
    }
}
