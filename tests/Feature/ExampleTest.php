<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase; // 1. Import trait ini
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase; // 2. Gunakan trait ini di dalam kelas

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
