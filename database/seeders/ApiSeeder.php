<?php

namespace Database\Seeders;

use App\Models\Api;
use Illuminate\Database\Seeder;

class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Api::factory()->count(5)->create();
    }
}
