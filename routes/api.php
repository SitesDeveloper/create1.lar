<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    //dd($router);
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Post',
    'middleware' => 'jwt.auth',
], function() {
    Route::get('/posts', 'IndexController')->name('api.post.index');
    Route::get('/posts/create', 'CreateController')->name('api.post.create');
    Route::post('/posts', 'StoreController')->name('api.post.store');
    Route::get('/posts/{post}', 'ShowController')->name('api.post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('api.post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('api.post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('api.post.destroy');
});