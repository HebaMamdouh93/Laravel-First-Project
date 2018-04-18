@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in with GitHub Account!
                </div>
            </div>

            
        </div>
        
    </div>
    <div class="panel panel-default">
                <div class="panel-heading">GitHub Account Info</div>

                <div class="panel-body">
                <p><strong>UserID:-</strong><?=Auth::guard('social')->user()->id?></p>    
                <p><strong>UserName:-</strong><?=Auth::guard('social')->user()->name?></p>
                <p><strong>Email:-</strong><?=Auth::guard('social')->user()->email?></p>
                <p><strong>CreatedAt:-</strong><?=Auth::guard('social')->user()->created_at?></p>
               

                   
                </div>
            </div>
    
</div>
@endsection
