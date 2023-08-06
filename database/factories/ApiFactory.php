<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Api;

class ApiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Api::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'url' => $this->faker->url,
            'key' => $this->faker->word,
            'status' => $this->faker->randomElement(["active","unactive"]),
            'description' => $this->faker->text,
        ];
    }
}
