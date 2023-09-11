<?php

namespace Database\Seeders;

use App\Models\CollegeDetail;
use Illuminate\Database\Seeder;

class CollegeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CollegeDetail::factory()->count(5)->create();
    }
}
