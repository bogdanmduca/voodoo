<?php

namespace Tests\Feature;

use App\Actions\GetRandomUserAction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetRandomUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_action_gets_random_user()
    {
        $user = User::factory()->count(5)->create();

        $user = $this->mock(User::class);

        $user->shouldReceive('inRandomOrder')->andReturnSelf();
        $user->shouldReceive('first')->andReturn(new User);

        $action = new GetRandomUserAction();

        $this->assertNotNull($action->handle());
    }
}
