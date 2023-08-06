<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'order_number' => $this->faker->numberBetween(-10000, 10000),
            'service_id' => Service::first()?->id || Service::factory(),
            'user_id' => User::first()?->id || User::factory(),
            'link' => $this->faker->word,
            'amount' => $this->faker->randomFloat(0, 0, 9999999999.),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->word,
        ];
    }
}
