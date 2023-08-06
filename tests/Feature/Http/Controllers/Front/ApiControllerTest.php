<?php

namespace Tests\Feature\Http\Controllers\Front;

use App\Models\Api;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Front\ApiController
 */
class ApiControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $apis = Api::factory()->count(3)->create();

        $response = $this->get(route('api.index'));

        $response->assertOk();
        $response->assertViewIs('api.index');
        $response->assertViewHas('apis');
        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
