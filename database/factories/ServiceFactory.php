<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Api;
use App\Models\Category;
use App\Models\Service;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'category_id' => Category::first()?->id || Category::factory(),
            'min_qte' => $this->faker->numberBetween(-10000, 10000),
            'max_qte' => $this->faker->numberBetween(-10000, 10000),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->randomElement(["active","unactive"]),
            'type' => $this->faker->randomElement(["default"]),
            'quality' => $this->faker->randomElement(["normal","medium","excellent"]),
            'partial_process' => $this->faker->boolean,
            'data_source' => $this->faker->randomElement(["manual","api"]),
            'api_id' => Api::first()?->id || Api::factory(),
            'api_service_id' => $this->faker->randomNumber(),
        ];
    }
}
