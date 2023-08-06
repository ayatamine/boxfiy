<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Api;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        if(!User::count())  User::factory(3)->create();
        if(!Category::count()) $this->call(CategorySeeder::class);
        if(!Api::count()) $this->call(ApiSeeder::class);
        if(!Service::count()) $this->call(ServiceSeeder::class);
        if(!Order::count()) $this->call(OrderSeeder::class);
    }
}
