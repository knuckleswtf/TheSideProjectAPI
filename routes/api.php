<?php

use App\Http\Controllers\SideProjectController;
use App\Http\Controllers\UserController;
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

/**
 * Healthcheck
 *
 * Check that the service is up. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and a response listing the failed services.
 *
 * @response 400 scenario="Service is unhealthy" {"status": "down", "services": {"database": "up", "redis": "down"}}
 * @responseField status The status of this API (`up` or `down`).
 * @responseField services Map of each downstream service and their status (`up` or `down`).
 */
Route::get('/healthcheck', function () {
    return [
        'status' => 'up',
        'services' => [
            'database' => 'up',
            'redis' => 'up',
        ],
    ];
});

/*
Route::middleware('auth:api')->get('/me', function (Request $request) {
    return $request->user();
});*/

Route::post('users/', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::get('users/', [UserController::class, 'index']);

Route::apiResource('sideprojects', SideProjectController::class);

Route::post('users/auth', function (Request $request) {
    $token = $request->user()->createToken();

    return ['token' => $token->plainTextToken];
});