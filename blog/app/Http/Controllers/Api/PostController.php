<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{
    public function index()
    {
        $allposts = Post::with('user')->paginate(1);
        return PostResource::collection($allposts);
    }  

    public function store(StorePostRequest $request)
    {
        $post=Post::create($request->all());
        return new PostResource($post);
    } 
}
