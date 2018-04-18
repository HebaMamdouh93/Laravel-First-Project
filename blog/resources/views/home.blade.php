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

                    You are logged in!
                </div>
                <?php if (!Auth::guard('social')->check()) {
                        // The user is logged in...
                    ?>
                    <a  class="btn btn-block btn-social btn-github " href="/login/github">
                <i class="fa fa-github " id="github">Sign in with GitHub</i> 
                    </a>
                    <?php }else{ ?>
                        <a  class="btn btn-block btn-social btn-github " href="/social">
                <i class="fa fa-github " id="github">Show GitHub Account Info</i> 
                    </a>
                    
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
@endsection
