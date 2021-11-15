<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class GateServiceProvider extends ServiceProvider
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
        Gate::define('delete-post', function (User $user, Post $post) {
            return !auth()->user()->is_admin || in_array($user->id, [$post->user_id, $post->community->user_id]);
        });
        Gate::define('adit-post', function (User $user, Post $post) {
            return $post->user_id == $user->id;
        });
    }
}
