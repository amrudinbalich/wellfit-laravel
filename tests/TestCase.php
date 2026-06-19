<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function registrationMock(): array
    {
        return [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'city' => 'Banja Luka',
            'phone' => '+381 64 322 4246',
            'birth_date' => now()
                ->subYears(rand(18, 80))
                ->subDays(rand(0, 365))
                ->format('Y-m-d'),
        ];
    }
}
