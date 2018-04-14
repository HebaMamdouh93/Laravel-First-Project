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
            <?php
         $created_at=date('Y-m-d', strtotime($post->created_at));
            ?>
            <td><?= $created_at ?></td>
            <td>
            <a href="/posts/{{$post->id}}"><button type="button" class="btn btn-info">View</button></a>    
            <a href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a>    
           
            <form action="/posts/{{$post->id}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
            </td>


        </tr>
        @endforeach
       
    </tbody> 
    </table>

@endsection