<?php

namespace Tests\Feature;

use App\Jobs\LogRandomUserJob;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class LogRandomUserCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_command_can_log_random_user()
    {
        Queue::fake();

        User::factory()->create();

        $this->artisan('log:random-user')
            ->expectsOutput("Job dispatched to log random user")
            ->assertExitCode(0);

        Queue::assertPushed(LogRandomUserJob::class, 1);
    }
}
