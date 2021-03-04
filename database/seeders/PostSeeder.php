<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::factory(20)
            ->has(Step::factory(4))
            ->create();
    }
}
