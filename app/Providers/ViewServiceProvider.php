<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //View::composer(['layouts.master', 'categories'], 'App\ViewComposers\CategoriesComposer');
        //View::composer(['layouts.master', 'auth.coupons.form'], 'App\ViewComposers\CurrenciesComposer');
        //View::composer(['layouts.master'], 'App\ViewComposers\BestProductsComposer');

        View::composer('*', function ($view) {
            $totals = [ 
                'posts' => Post::count()
            ];
            $view->with('totals', $totals);
        });
    }
}