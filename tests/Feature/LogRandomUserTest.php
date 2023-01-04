<?php

namespace Tests\Feature;

use App\Actions\LogRandomUserAction;
use App\Jobs\LogRandomUser as JobsLogRandomUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LogRandomUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_action_logs_random_user_details()
    {
        User::factory()->create();

        Log::shouldReceive('info')
            ->once()
            ->withArgs(
                [
                    'Random user: '  . json_encode(User::first())
                ]
            );

        $action = new LogRandomUserAction();

        $action->handle();
    }

    public function test_a_job_logs_random_user_details()
    {
        User::factory()->create();

        Log::shouldReceive('info')
            ->once()
            ->withArgs(
                [
                    'Random user: '  . json_encode(User::first())
                ]
            );

        $action = new JobsLogRandomUser();

        $action->handle();
    }
}
