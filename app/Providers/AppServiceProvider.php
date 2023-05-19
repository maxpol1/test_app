<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('pages._sidebar', function ($view){
            $view->with('popularPost', Post::getPopularPost());
            $view->with('featuredPost',Post::getFeaturedPost());
            $view->with('recentPost', Post::getRecentPost());
            $view->with('categories', Category::all());
        });
        Schema::defaultStringLength(191);
    }
}
