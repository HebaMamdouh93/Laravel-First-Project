@extends('layouts.master')

@section('content')
<div class="text-center">
<a href="/posts/create"><button id="new" class="btn btn-success text-center">Create Post</button></a>
<a href="/posts/restore"><button id="new" class="btn btn-warning text-center">Restore</button></a>
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
            <th>Slug</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
         
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach ($posts as $post) 
        <tr>
            <td><?= $i++?></td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->user->name}}</td>
            <?php
         $created_at=date('Y-m-d', strtotime($post->created_at));
            ?>
            <td><?= $created_at ?></td>
            <td>{{$post->slug}}</td>
            <td><img src="{{$post->image}}"/></td>
            
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
    <nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>


@endsection