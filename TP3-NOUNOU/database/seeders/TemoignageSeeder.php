<?php

namespace Database\Seeders;

use App\Models\Temoignage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemoignageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Temoignage::factory()->count(random_int(40, 100))->create();
    }
}
