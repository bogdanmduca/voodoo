<?php

namespace App\Actions;

use App\Models\User;

class GetRandomUserAction
{
    public function handle(): User
    {
        return User::inRandomOrder()->first();
    }
}
