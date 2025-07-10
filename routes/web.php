<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $aboutPageUrl = '/about';

    $aboutPageUrl = route('about');
    dd($aboutPageUrl);

    return view('welcome');
});

Route::view('/about', 'about')->name('about');

Route::get('/car', [CarController::class, 'index']);

Route::get('/test', TestController::class);

Route::get('/', [HomeController::class, 'index']);


Route::get('/', function () {
    $aboutPageUrl = '/about1';

    $aboutPageUrl = route('about1');
    dd($aboutPageUrl);

    return view('posts');
});


Route::view('/about', 'about')->name('about');

Route::get('/posts', [PostController::class, 'index']);



Route::get('/posts/updateOrCreate', [PostController::class, 'updateOrCreate'])->name('posts.updateOrCreate');
Route::get('/posts/firstOrCreate', [PostController::class, 'firstOrCreate'])->name('posts.firstOrCreate');
Route::get('/posts/delete', [PostController::class, 'delete'])->name('posts.delete');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');

Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');


Route::get('/posts/update', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts', [PostController::class, 'index'])->name('post.index');

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
