<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\TicketCategory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ticket_category_id' => TicketCategory::factory(),
            'order_id' => Order::factory(),
            'ticket_name' => $this->faker->word,
            'status' => $this->faker->boolean,
        ];
    }
}
