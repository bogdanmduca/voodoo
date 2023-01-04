<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class LogRandomUserAction
{
    public function handle()
    {
        Log::info(
            'Random user: ' .
                json_encode(
                    User::inRandomOrder()->first()
                ),
        );
    }
}
