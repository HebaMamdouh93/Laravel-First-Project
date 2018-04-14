@extends('layouts.master')


@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="/posts/{{$post->id}}">
<input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}

                    <div class="form-group ">
                        <label>Post Title:</label>
                        
                        <input type="text" class="form-control"  name="title" value="{{$post->title}}"/>
                            
                    </div>
                    <div class="form-group">
                            <label>Post Description:</label>
                            
                             
                            <textarea name="description" class="form-control" >{{$post->description}}</textarea> 
                               
                            
                    </div>

                        <div class="form-group ">
                                <label>Post Creator:</label>
                               
                                 
                                <select class="form-control" name="user_id">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}" {{ ($user->id == $post->user->id) ? "selected='selected'": ''}}>{{$user->name}}</option>
                                    @endforeach

                                    </select>
                                   
                               
                            </div>
                   
               



<br>
<input type="submit" value="Update" class="btn btn-primary">

</form>

@endsection