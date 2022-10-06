<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;


class UpdateController extends Controller
{
    
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image'=> 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);

        return view('post.show', compact('post'));
    }
}
