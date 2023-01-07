<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class LogRandomUserAction
{
    protected $messagePrefix  = 'Random user: ';

    public function __construct(protected GetRandomUserAction $getRandomUserAction)
    {
    }

    public function handle(): void
    {
        Log::info(
            $this->messagePrefix .
                json_encode(
                    $this->getRandomUserAction->handle()
                ),
        );
    }
}
