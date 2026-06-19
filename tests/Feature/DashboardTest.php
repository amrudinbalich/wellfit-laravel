<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     */
    public function test_dasboard_access_if_unauthenticated(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertStatus(302); // because you are unauthenticated
    }

    public function test_dashboard_access_when_authenticated(): void
    {
        // make user
        $this->post(route('register.store'), $this->registrationMock());

        $this->assertAuthenticated();

        $response = $this->get(route('dashboard'));

        $response->assertOk();
        $response->assertViewIs('dashboard');
    }
}
