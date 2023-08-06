<?php

namespace Tests\Feature\Http\Controllers\Front;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Front\ServiceController
 */
class ServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $services = Service::factory()->count(3)->create();

        $response = $this->get(route('service.index'));

        $response->assertOk();
        $response->assertViewIs('service.index');
        $response->assertViewHas('services');
        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
