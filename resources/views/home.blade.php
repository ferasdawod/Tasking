@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>The Great Tasking Application</h2></div>

                <div class="panel-body">
                    <p>Welcome to the great Tasking application. to get started login below</p>
                    <p><a href="{{ url('/login') }}" class="btn btn-primary">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
