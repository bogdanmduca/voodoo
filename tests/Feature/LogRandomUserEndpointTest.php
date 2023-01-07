<?php

namespace Tests\Feature;

use App\Jobs\LogRandomUserJob;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class LogRandomUserEndpointTest extends TestCase
{
    use RefreshDatabase;

    function setUp(): void
    {
        parent::setUp();

        Queue::fake();

        User::factory()->create();
    }

    public function test_endpoint_can_log_random_user()
    {
        $this->getJson('api/logged-users')->assertStatus(201);

        Queue::assertPushed(LogRandomUserJob::class, 1);
    }

    public function test_endpoint_can_log_random_user_v2()
    {
        $this->getJson('api/v2/logged-users')->assertStatus(201);

        Queue::assertPushed(LogRandomUserJob::class, 1);
    }
}
