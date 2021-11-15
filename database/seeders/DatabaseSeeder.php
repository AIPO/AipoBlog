<?php

namespace Database\Seeders;

use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TopicSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CommunitySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostVoteSeeder::class);


    }
}
