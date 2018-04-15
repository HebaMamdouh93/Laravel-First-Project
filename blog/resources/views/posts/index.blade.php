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
                <button type="submit" class="btn btn-danger" >Delete</button>
            </form>
             <!-- Trigger the modal with a button -->
  <button type="button" post-id="{{$post->id}}" class="btn btn-default viewajax" data-toggle="modal" data-target="#myModal">View Ajax</button>
            </td>


        </tr>
        @endforeach
       
    </tbody> 
    </table>
    <!-- Bootstrap Model -->
   

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Post Info</h4>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
    	
			<div class="panel-heading">Post Details</div>
			<div class="panel-body">
            
            <fieldset class="col-md-6">    	
					
					<div class="panel panel-default">
						<div class="panel-body">
            <strong>Title:-</strong> <span id="title"></span>
                            <p><strong>Description:-</strong></p>
                            <p id="description"></p>

						</div>
					</div>
					
				</fieldset>				
				
				<div class="clearfix"></div>
            </div>
           
                
</div>

<br/>
<br/>

<div class="panel panel-default">
    	
			<div class="panel-heading">Post Creator Info</div>
			<div class="panel-body">
            
            <fieldset class="col-md-6">    	
					
					<div class="panel panel-default">
						<div class="panel-body">
            <strong>Name:-</strong><span id="username"></span>
            </br>
            <strong>Email:-</strong><span id="email"></span>
            
                            

						</div>
					</div>
					
				</fieldset>				
				
				<div class="clearfix"></div>
            </div>
           
                
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
    <!-- Paganation-->
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