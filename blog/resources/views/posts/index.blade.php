@extends('layouts.master')

@section('content')
<div class="text-center">
<a href="/posts/create"><button id="new" class="btn btn-success text-center">Create Post</button></a>
</div>

    <br/>
    <table class="table table-striped table-hover">
        <thead class="thead-dark ">
        
        <tr>
            <th>#pagination</th>
            <th>Title</th>
            <th>Description</th>
            <th>Posted By</th>
            <th>CreatedAt</th>
            <th>Action</th>
          </tr>
         
        </thead>
        <tbody>
      
        @foreach ($posts as $post) 
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->created_at}}</td>
            <td>
            <button type="button" class="btn btn-info">View</button>    
            <a href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a>    
            <button type="button" class="btn btn-danger">Delete</button>
           
            </td>


        </tr>
        @endforeach
       
    </tbody> 
    </table>

@endsection