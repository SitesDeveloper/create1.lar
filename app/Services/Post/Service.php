<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{

    // {  формат $data:  если id есть -то взять имеющийся, иначе создать
    //     "title" : "aaa",
    //              "content": "asdf adsf a",
    //              "image": "asdf asdf",
    //              "likes": 20,
    //              "category": {
    //                  "id": 1,
    //                  "title": "some new cat"
    //              },
    //              "tags": [
    //                  {
    //                      "id": 15,
    //                      "title": "some new tag"
    //                  },
    //                  {
    //                      "title": "new some tag"
    //                  }
    //              ]
    //  }
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);
            //dd($data);
            $data['category_id'] = $this->getCategoryId($category);
            $tagsId = $this->getTagsId($tags);
            $post = Post::create($data);
            $post->tags()->attach($tagsId);
            DB::commit();
        } catch (\Exception$exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }

    private function getTagsId($tags)
    {
        $tagsId = [];
        foreach ($tags as $tag) {
            $t = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagsId[] = $t->id;
        }
        return $tagsId;
    }

    /*
    Аргументы как у сторе, но обновляются данные категории и тэгов если заданы id
     */
    public function update($post, $data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $data['category_id'] = $this->getCategoryIdWithUpdate($category);
            $tagsId = $this->getTagsIdWithUpdate($tags);

            $post->update($data);
            $post->tags()->sync($tagsId);
            
        } catch (\Exception$exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post->fresh();
    }

    private function getCategoryIdWithUpdate($item)
    {
        $category = '';
        if (!isset($item['id'])) {
            $category = Category::create($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category->fresh();
        }

        return $category->id;
    }

    private function getTagsIdWithUpdate($tags)
    {
        $tagsId = [];
        foreach ($tags as $tag) {
            $t = '';
            if (!isset($tag['id'])) {
                $t = Tag::create($tag);
            } else {
                $t = Tag::find($tag['id']);
                $t->update($tag);
                $t = $t->fresh();
            }
            $tagsId[] = $t->id;
        }
        return $tagsId;
    }

}
