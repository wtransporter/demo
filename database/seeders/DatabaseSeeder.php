<?php

namespace Database\Seeders;

use App\Models\Ingredient;
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
            IconSeeder::class
        ]);

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678')
        ]);

        \App\Models\User::factory(20)
            ->has(
                Post::factory(2)
                ->has(Step::factory(4))
                ->has(Ingredient::factory(5))
            )
            ->create();
    }
}
