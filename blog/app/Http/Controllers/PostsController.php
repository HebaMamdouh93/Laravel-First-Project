<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Carbon\Carbon;
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

    //Delete Post

    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        //$request->session()->flash('message', 'Successfully deleted the task!');
        return redirect(route('posts.index'));
    }

    //Show Post Details

    public function show(Post $post)
    {
        //$dt = Carbon::create($post->user->created_at);
        $dt = new Carbon($post->user->created_at);
        $created_at= $dt->format('l jS \\of F Y h:i:s A');
        return view('posts.show', compact('post',$post),[
            'created_at' => $created_at,
            
        ]);
    }





}
