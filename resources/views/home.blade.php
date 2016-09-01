@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">The Great Tasking Application</div>

                <div class="panel-body">
                    <p>Welcome to our great app</p>
                    <p>Start using the app by loggin in</p>
                    <p><a href="{{ url('/login') }}" class="btn btn-primary">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
