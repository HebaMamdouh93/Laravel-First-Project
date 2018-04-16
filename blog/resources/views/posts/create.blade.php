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
<form method="post" action="/posts" enctype="multipart/form-data">
{{csrf_field()}}

                    <div class="form-group ">
                        <label>Post Title:</label>
                        
                        <input type="text" class="form-control"  name="title"/>
                            
                    </div>
                    <div class="form-group">
                            <label>Post Description:</label>
                            
                             
                            <textarea name="description" class="form-control" cols=0 rows=10></textarea> 
                               
                            
                    </div>

                    <div class="form-group">
                            <label>Post Tags:</label>
                            
                             
                            <input type="text" name="tags" class="form-control" placeholder="Please Enter tags separated by comma"/>
                               
                            
                    </div>

                        <div class="form-group ">
                                <label>Post Creator:</label>
                               
                                 
                                <select class="form-control" name="user_id">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach

                                    </select>
                                   
                               
                            </div>
                   
               



<br>
<div class="form-group">
<label>Upload Image</label>

<div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" class="form-group" name="image" multiple>
                </span>
            </span>
           
        </div>
</div>

        
<input type="submit" value="Create" class="btn btn-success">

</form>


@endsection