<?php

namespace Tests\Feature\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Front\OrderController
 */
class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $orders = Order::factory()->count(3)->create();

        $response = $this->get(route('order.index'));

        $response->assertOk();
        $response->assertViewIs('order.index');
        $response->assertViewHas('orders');
        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
