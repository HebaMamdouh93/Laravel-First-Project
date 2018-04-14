<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //Display All posts
    public function index()
    {
       $posts= Post::all();
       //$posts->paginate(3);
       //$posts= App\Post::paginate(3);           
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
    public function store(StorePostRequest $request)
    {
        $input = $request->except(['slug']);
        Post::create($input);
        
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


    public function update(UpdatePostRequest $request,  $id)
    {
       
        $post = Post::findOrFail($id);

  

    $input = $request->all();
    $post->slug = null;
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
