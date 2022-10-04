<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;

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


Route::get('/posts', [ PostController::class, 'index'] )->name('post.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');



Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
