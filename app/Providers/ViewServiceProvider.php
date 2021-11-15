<?php

namespace App\Providers;

use App\Models\Community;
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
        View::composer('layouts.sidebar',function ($view){
            $view->with('newestPosts',
                Post::with('community')->latest()->take(5)->get()
            );
            $view->with('newestCommunities',
                Community::withCount('posts')->latest()->take(5)->get()
            );
        });
        View::share('test',Post::latest()->take(5)->get());
    }
}
