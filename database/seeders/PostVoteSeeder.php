<?php

namespace Database\Seeders;

use Database\Factories\PostVoteFactory;
use Illuminate\Database\Seeder;

class PostVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostVoteFactory::times(1000)->create();
    }
}
