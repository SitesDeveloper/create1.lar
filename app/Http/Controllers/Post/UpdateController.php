<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Post\PostResource;

class UpdateController extends BaseController
{
    
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($post, $data);

        return new PostResource($post);

        //return view('post.show', compact('post'));
    }
}
