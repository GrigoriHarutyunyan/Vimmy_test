<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController As Home;
use App\Http\Controllers\PostsController As Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(Home::class)->group(function (){
    Route::get('/', 'index')->name('welcome');
});

Route::controller(Post::class)->group(function (){
    Route::get('user/{id}/posts', 'showUserPosts')->name('user.show');
});

Route::middleware(['auth'])->group(function (){
    Route::controller(Post::class)->group(function (){
        Route::get('/dashboard', 'authUserPosts')->name('dashboard');
        Route::prefix('post')->group(function (){
            Route::get('/create', 'create')->name('post.create');
            Route::post('/store', 'store')->name('post.store');
            Route::get('/edit/{id}', 'edit')->name('post.edit');
            Route::put('/update/{id}', 'update')->name('post.update');
            Route::delete('/destroy/{id}', 'destroy')->name('post.destroy');
        });

    });
});

require __DIR__.'/auth.php';
