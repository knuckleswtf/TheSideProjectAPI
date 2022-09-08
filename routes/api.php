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
Route::get('/healthcheck/{unnecessaryParam?}', function () {
    return [
        'status' => 'up',
        'services' => [
            'database' => 'up',
            'redis' => 'up',
        ],
    ];
});


Route::middleware('auth:api')->get('/me', function (Request $request) {
    return $request->user();
});
Route::post('users/', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::get('users/', [UserController::class, 'index']);
Route::post('users/{id}/auth', [UserController::class, 'authenticate']);

Route::apiResource('side_projects', SideProjectController::class);
Route::post('side_projects/finish', [SideProjectController::class, 'finish']);

/**
 * Nested fields
 *
 * @group Dummy endpoints
 * @subgroup A subgroup
 * @queryParam random A random query parameter.
 * @bodyParam data object required The data
 * @bodyParam data.name string required A string field.
 * @bodyParam data.size int A number. Example: 5
 * @bodyParam data.other string Optional thing. No-example
 * @bodyParam data.things string[] An array of strings. Example: ['paul', 'peter']
 * @bodyParam data.objects object[] An array of objects
 * @bodyParam data.objects[].a string A field in the array of objects
 * @bodyParam data.objects[].b string A field in the array of objects
 */
Route::post('/nested', function () {
    return request()->all();
});

/**
 * Body content array
 *
 * @group Dummy endpoints
 * @subgroup A subgroup
 * @bodyParam [] object[] List of items
 * @bodyParam [].row_id string A unique ID. Example: 700
 * @bodyParam [].name string required An element name. Example: My item name
 */
Route::post('/array-body', function () {
    return request()->all();
});

/**
 * File input
 *
 * @group Dummy endpoints
 * @subgroup Another subgroup
 * @bodyParam the_file file required Just a file.
 * @bodyParam nested object required
 * @bodyParam nested._string string required A nested string.
 * @bodyParam nested._file file required A nested file.
 */
Route::post('/file-input', function () {
    return request()->all();
});


/**
 * @group Dummy endpoints
 * @subgroup Another subgroup
 * @subgroupDescription This time, with a description!
 * @header Test Value
 */
Route::get('/v1/languages', function () {
    return request()->all();
});
