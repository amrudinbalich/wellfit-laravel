<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateNewUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_page_shows(): void
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }
    
    public function test_user_creation(): void
    {
        $this->post(route('register.store'), $this->registrationMock());
        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    public function test_user_login_after_registration(): void
    {
        $response = $this->post(route('register.store'), $this->registrationMock());

        $this->assertAuthenticated();

        $response->assertRedirect(
            route('dashboard')
        );
    }
}
