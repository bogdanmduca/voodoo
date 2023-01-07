<?php

namespace Tests\Feature;

use App\Actions\GetRandomUserAction;
use App\Actions\LogRandomUserAction;
use App\Jobs\LogRandomUserJob;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LogRandomUserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->create();
    }

    public function test_an_action_logs_random_user_details()
    {
        $this->assertLogged();

        $action = new LogRandomUserAction(new GetRandomUserAction());

        $action->handle();
    }

    public function test_a_job_logs_random_user_details()
    {
        $this->assertLogged();

        (new LogRandomUserJob)->handle();
    }

    protected function assertLogged()
    {
        Log::shouldReceive('info')
            ->once()
            ->withArgs(
                [
                    'Random user: '  . json_encode(User::first())
                ]
            );
    }
}
