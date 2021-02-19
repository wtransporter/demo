<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Kolači', 'slug' => 'kolaci', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Torte', 'slug' =>'torte', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Slana jela', 'slug' =>'slana-jela', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
