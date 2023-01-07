<?php

namespace Tests\Feature;

use App\Jobs\LogRandomUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class LogRandomUserEndpointTest extends TestCase
{
    use RefreshDatabase;

    public function test_endpoint_can_log_random_user()
    {
        Queue::fake();

        User::factory()->create();

        // Log::shouldReceive('info')
        //     ->once()
        //     ->withArgs(
        //         [
        //             'Random user: '  . json_encode(User::first())
        //         ]
        //     );

        $response = $this->getJson('api/logged-users');
        $response->assertStatus(201);

        Queue::assertPushed(LogRandomUser::class, 1);
    }
}
