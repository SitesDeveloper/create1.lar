<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;

// use App\Http\Controllers\Post\EditController;
// use App\Http\Controllers\Post\ShowController;
// use App\Http\Controllers\Post\IndexController;
// use App\Http\Controllers\Post\StoreController;
// use App\Http\Controllers\Post\CreateController;
// use App\Http\Controllers\Post\UpdateController;
// use App\Http\Controllers\Post\DestroyController;


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

Route::get('/', function () {
    //return view('welcome');
    return 'asdfsadf';
});


// 'namespace'=>'App\HTTP\Controllers\Post'

// Route::group([], function(){

//     Route::get('/posts', IndexController::class )->name('post.index');
//     Route::get('/posts/create', CreateController::class)->name('post.create');
//     Route::post('/posts', StoreController::class)->name('post.store');
//     Route::get('/posts/{post}', ShowController::class)->name('post.show');
//     Route::get('/posts/{post}/edit', EditController::class)->name('post.edit');
//     Route::patch('/posts/{post}', UpdateController::class)->name('post.update');
//     Route::delete('/posts/{post}', DestroyController::class)->name('post.destroy');

// });


Route::group(['namespace'=>'App\Http\Controllers\Post'], function(){
    Route::get('/posts', 'IndexController' )->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
});




Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
