<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_make_user(): void
    {
        $email = 'test@mail.ru';
        $this->artisan('user:make')
            ->expectsQuestion('Email', $email)
            ->assertSuccessful();

        $this->assertDatabaseHas('users',[
            'email' => $email
        ]);
    }
}
