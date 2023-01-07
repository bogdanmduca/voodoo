<?php

use App\Http\Controllers\LoggedUserController;
use App\Jobs\LogRandomUserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('logged-users', function () {

    LogRandomUserJob::dispatch();

    return response()->json('Job Dispatched', 201);
});

Route::get('v2/logged-users', LoggedUserController::class);
