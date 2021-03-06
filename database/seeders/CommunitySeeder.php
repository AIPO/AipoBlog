<?php

namespace Database\Seeders;

use App\Models\Community;
use Database\Factories\CommunityFactory;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommunityFactory::times(10)->create();
    }
}
