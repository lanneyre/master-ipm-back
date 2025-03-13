<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create(['role' => 1]);
        User::factory()->create(['role' => 2]);
        User::factory()->count(5)->create();
    }
}
