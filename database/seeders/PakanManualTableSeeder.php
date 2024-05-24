<?php

namespace Database\Seeders;

use App\Models\PakanManual;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PakanManualTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PakanManual::updateOrCreate(
            ['id' => 1,],
            ['status_pakan' => 0]
        );
    }
}
