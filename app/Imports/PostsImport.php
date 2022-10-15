<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dump($collection);
        foreach ($collection as $item) {
            if (isset($item['zagolovok']) && trim($item['zagolovok'])!='') {
                dump($item);
                $res = Post::firstOrCreate([
                    'title' => $item['zagolovok']
                ],[
                    'title' => $item['zagolovok'],
                    'content' => $item['soderzanie'],
                    'image' => $item['img'],
                    'likes' => $item['laikov'],
                    'is_published' => $item['status_publikacii'],
                    'category_id' => $item['kategoriia']
                ]);
                //dump($res);
            } 
        }
        dump('finish');
    } 
}
