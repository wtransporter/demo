<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Icon::create([
            'body' => 'fas fa-bacon'
        ]);
        Icon::create([
            'body' => 'fas fa-cookie'
        ]);
        Icon::create([
            'body' => 'fas fa-drumstick-bite'
        ]);
        Icon::create([
            'body' => 'fas fa-hamburger'
        ]);
        Icon::create([
            'body' => 'fas fa-bread-slice'
        ]);
        Icon::create([
            'body' => 'fas fa-birthday-cake'
        ]);
    }
}
