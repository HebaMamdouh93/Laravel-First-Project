@extends('layouts.master')


@section('content')
<div class="container">
<br/>
<div class="panel panel-default">
    	
			<div class="panel-heading">Post Info</div>
			<div class="panel-body">
            
            <fieldset class="col-md-6">    	
					
					<div class="panel panel-default">
						<div class="panel-body">
                            <p><strong>Title:-</strong>{{$post->title}}</p>
                            <p><strong>Description:-</strong></p>
                            <p>{{$post->description}}</p>

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
                            <p><strong>Name:-</strong>{{$post->user->name}}</p>
                            <p><strong>Email:-</strong>{{$post->user->email}}</p>
                            <p><strong>Created At:-</strong>{{$created_at}}</p>
                            

						</div>
					</div>
					
				</fieldset>				
				
				<div class="clearfix"></div>
            </div>
           
                
</div>
</div>
@endsection