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
            'body' => 'fas fa-bacon fa-3x'
        ]);
        Icon::create([
            'body' => 'fas fa-cookie fa-3x'
        ]);
        Icon::create([
            'body' => 'fas fa-drumstick-bite fa-3x'
        ]);
        Icon::create([
            'body' => 'fas fa-hamburger fa-3x'
        ]);
        Icon::create([
            'body' => 'fas fa-bread-slice fa-3x'
        ]);
        Icon::create([
            'body' => 'fas fa-birthday-cake fa-3x'
        ]);
    }
}
