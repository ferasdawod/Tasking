@extends('layouts.app')
@section("additional_styles")
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
@endsection
@section("headerBrand")
    <img class="img-responsive" id="imgbrand" src="{{ asset('images/Tasker.png') }}">
@endsection
@section('content')
<div class="container content">
    <div class="row">
<<<<<<< HEAD
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>The Great Tasking Application</h2></div>

                <div class="panel-body">
                    <p>Welcome to the great Tasking application. to get started login below</p>
                    <p><a href="{{ url('/login') }}" class="btn btn-primary">Login</a></p>
=======
        <div class="col-xs-12 col-md-6">
            <p class="slogan">Tasking<br>Made easy.</p>
        </div>
        <div class="col-md-1">
            <div class="vr">&nbsp;</div>
        </div>
        <div class="col-xs-12 col-md-5">
            <div class="leftSide">
                <div class="hr">&nbsp;</div>
                <p class="getStarted">Get started.</p>
                <div class="buttons" style="font-face: roboto; ">
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}" >
                            <button class="btn btn-danger btn-lg" style="width: 150px;">Login</button><br><br>
                        </a>
                        <a href="{{ url('/register') }}">
                            <button class="btn btn-danger btn-lg" style="width: 150px;">Register</button>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}">
                            <button class="btn btn-danger btn-lg" style="width: 150px">Dashboard</button>
                        </a>
                    @endif
>>>>>>> 6334454fcce312b50b87f1581de00682f1cff3d6
                </div>
            </div>
        </div>
    </div>
</div>

<footer style="position: fixed;bottom: 0;font-size: 10px; color: #6b6b6b; width: 100%; text-align: center;">
    Made with <i class="fa fa-heart"></i> by Feras Dawod & Safwan Alhaji.
</footer>

@endsection
@section('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection