<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use File;
use DB;
use Storage;
class PostsController extends Controller
{
    //Display All posts
    public function index()
    {
        $posts = Post::paginate(3);

    $posts->withPath('posts');
      // $posts= Post::all();
       //$posts->paginate(3);
                
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
     
        
        if( $request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->storeAs('public',$filename);
            
        }
        
       $input = $request->except(['slug']);
        $tags_str=$request->tags;
        $tags=explode(',',$tags_str);
        $post=Post::create($input);
        $post->update(['image' => $filename]);

        //adding multiple tags
        $post->attachTags($tags);
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
        
        $post->slug = null;
         if( $request->hasFile('image')) {
            unlink(public_path() . '/storage/'.$post->image);
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->storeAs('public',$filename);
            
        }

        $post->fill($request->only(['title','description','user_id','image']))->save();
        $post->update(['image' => $filename]);
        return redirect(route('posts.index'));
    }

    //Delete Post

    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
      
        unlink(public_path() . '/storage/'.$post->image);
      
        $post->delete();
        
        return redirect(route('posts.index'));
    }

    //Show Post Details

    public function show(Post $post)
    {
        return view('posts.show', compact('post',$post));
    }

    //restore deleted post
    public function restore()
    {
      
       $posts =Post::onlyTrashed()->restore();
        return redirect(route('posts.index'));
    }


    //view post info trough Ajax request
    public function viewAjax(Request $request)
    {
        // do something here
        $data = $request->postId; // This will get all the request data.
        $post = Post::findOrFail($data);
        $username=$post->user->name;
        $email=$post->user->email;
        return response()->json(['response' => "succes",'post' =>$post 
        ,'username'=>$username ,'email' =>$email ]);
        
    } 





}
