<?php

namespace App\Console\Commands;

use App\Imports\PostsImport;
use App\Models\Post;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Data from json-placeholder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('memory_limit', -1);
        Excel::import(new PostsImport, public_path( '/excel/posts.xlsx' ) );
        //$data = json_decode($response->getBody()->getContents());

        // foreach ($data as $item) {
        //     Post::firstOrCreate([
        //         'title' => $item->title,
        //     ],[
        //         'title' => $item->title,
        //         'content' => $item->body,
        //         'category_id' => 2
        //     ]);
        // }
        
        dd('finish');
    }
}
