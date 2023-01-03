<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Tests\TestCase;

class CreateItemTest extends TestCase
{
    public function test_can_create_item()
    {
        $user = User::latest()->first();
        $response = $this->postJson(
            'api/todoitems',
            ['token' => $user->id, 'text' => '123']
        );
        $response->assertCreated();
    }
}
