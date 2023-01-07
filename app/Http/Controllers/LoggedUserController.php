<?php

namespace App\Http\Controllers;

use App\Jobs\LogRandomUserJob;
use Illuminate\Http\JsonResponse;

class LoggedUserController extends Controller
{
    public function __invoke(): JsonResponse
    {
        LogRandomUserJob::dispatch();

        return response()->json('Job Dispatched', 201);
    }
}
