<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use Livewire;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'home') -> name('home');
Route::view('/about', 'about') -> name('about');
Route::get('/blogs', App\Http\Livewire\Blogs::class) -> name('blogs');
Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', \App\Http\Livewire\Auth\Login::class) -> name('login');
    //Route::get('/register', \App\Http\Livewire\Auth\Register::class) -> name('register');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/post/edit/{slug}', \App\Http\Livewire\Edit::class) -> name('edit');
    Route::get('/post/delete/{id}',  \App\Http\Livewire\Delete::class) -> name('delete');
    Route::get('/post/create', \App\Http\Livewire\PostCreate::class) -> name('create');
    Route::get('/logout', function(){
        Auth::logout();
        return redirect()->route('login');
    }) -> name('logout');
});

Route::get('/post/{slug}', \App\Http\Livewire\Post::class);
