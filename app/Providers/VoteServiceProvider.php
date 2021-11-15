<?php

namespace App\Providers;

use App\Models\PostVote;
use App\Observers\PostVoteObserver;
use Illuminate\Support\ServiceProvider;

class VoteServiceProvider extends ServiceProvider
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
        PostVote::observe(PostVoteObserver::class);
    }
}
