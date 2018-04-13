<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //Display All posts
    public function index()
    {
       $posts= Post::all();
       return view('posts.index',[
        'posts' => $posts
       ]);
    }

    //Create New Post

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users
        ]);
    }

    //Store Post in database
    public function store(Request $request)
    {
        
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        
       return redirect(route('posts.index')); 
    }
   //Edit Post in database
    public function edit(Post $post)
    {
        $users = User::all();
       
        return view('posts.edit',compact('post',$post),[
            'users' => $users,
            
        ]);
    }


    public function update(Request $request,  $id)
    {
       
        $post = Post::findOrFail($id);

  

    $input = $request->all();

    $post->fill($input)->save();

        return redirect(route('posts.index'));
    }





}
