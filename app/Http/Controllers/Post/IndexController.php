<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Post\PostResource;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        //$this->authorize('view', auth()->user());

        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate($perPage, '*', 'page', $page);

        return PostResource::Collection($posts);

        //return view('post.index', compact('posts'));
    }
}
