<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function create() {
        $postsArr = [
            [
            'title' => 'Статья Васи',
            'content' => 'Контент статьи Васи',
            'image' => 'image_vasya.jpb',
            'likes' => 32,
            'is_published' => 1,
            ],
            [
                'title' => 'Статья Пети',
                'content' => 'Контент статьи Пети',
                'image' => 'image_petya.jpb',
                'likes' => 12,
                'is_published' => 1,
            ]
        ];

        foreach ($postsArr as $post)
            Post::create($post);
        
        dd('create');
    }

    public function update() {
        $post = Post::find(6);

        $post->update([
            'content' => 'update Контент статьи',
        ]);
        dump($post->title);
    }

    public function delete() {
        //$post = Post::find(2);
        //$post->delete();

        $post = Post::withTrashed()->find(2);
        $post->restore();
        dump('restored');
    }

    public function firstOrCreate() {
        $post = Post::firstOrCreate(
            ['title'=>'Статья Ксюши'],
            [
                'title' => 'Статья Ксюши',
                'content' => 'some conent',
                'image' => 'some_image_vasya.jpb',
                'likes' => 34332,
                'is_published' => 1,
            ]
        );
        dump($post->content);
        dd('finished');
    }


    public function updateOrCreate() {
        $post = Post::updateOrCreate(
            ['title'=>'Статья Ани'],
            [
                'title' => 'Статья Ани',
                'content' => 'some conent 11',
                'image' => 'some_image_vasya.jpb',
                'likes' => 322,
                'is_published' => 1,
            ]
        );
        dump($post->content);
        dd('finished');
    }

}
