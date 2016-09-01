<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function() {
    return view('home');
})->name("home");

Route::get('/dashboard', function() { return view('dashboard'); })->name('dashboard');

Auth::routes();
