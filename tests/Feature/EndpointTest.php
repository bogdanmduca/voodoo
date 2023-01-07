<?php

namespace Tests\Feature;

use App\Actions\LogRandomUserAction;
use App\Jobs\LogRandomUser as JobsLogRandomUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class EndpointTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_log_random_user()
    {
        User::factory()->create();

        Log::shouldReceive('info')
            ->once()
            ->withArgs(
                [
                    'Random user: '  . json_encode(User::first())
                ]
            );

        $response = $this->getJson('api/logged-users');
        $response->assertStatus(201);
    }
}
