<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use File;
use DB;
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
        /*if( $request->hasFile('image')) {
           
            

            //$imagepath = $request->image->move($path, $filename);
            //$post->image = $imagepath;
            $image = $request->file('image');
            $path = public_path(). '/images/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //dd($filename);
            $image->move($path, $filename);
        //dd($imagepath);
            //$post->image = $imagepath;
            //$post->update(['image' => $imagepath]);
        }
        */
        $tags_str=$request->tags;
        $tags=explode(',',$tags_str);
        $post=Post::create($input);

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
/*
        if ($request->hasFile('image')) {
            $request->file('image')->store('public/images');
            
            // ensure every image has a different name
            $file_name = $request->file('image')->hashName();
            
            // save new image $file_name to database
            $post->update(['image' => $file_name]);
        }
*/
        if( $request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path(). '/images/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            dd($filename);
            $image->move($path, $filename);
        
            $post->image = $imagepath;
            $post->update(['image' => $imagepath]);
        }
        
        $post->fill($request->only(['title','description','user_id']))->save();

        return redirect(route('posts.index'));
    }

    //Delete Post

    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
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

    //restore deleted post
    public function restore()
    {
      
       $posts =Post::onlyTrashed()->restore();
        return redirect(route('posts.index'));
    }





}
