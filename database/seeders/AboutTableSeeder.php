<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = About::updateOrCreate(
            ['id' => 1],
            ['title' => 'Tentang Kami', 'content' => '-',]
        );
    }
}
