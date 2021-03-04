<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Step;
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
        $this->call([
            CategorySeeder::class,
        ]);

        \App\Models\User::factory(20)
            ->has(
                Post::factory(2)
                ->has(Step::factory(4))
            )
            ->create();
    }
}
