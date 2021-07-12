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

Route::get('/healthcheck', function () {
    return [
        'status' => 'up',
        'services' => [
            'database' => 'up',
            'redis' => 'up',
        ],
    ];
});

/**
 * @urlParam name string required This urlParam is not parsed because it is overwritten in the urlParam located in DynamicDataTest.
 */
Route::get('/dynamic_data/{name}', function ($name) {
    return [
        'name' => $name,
    ];
});

/*
Route::middleware('auth:api')->get('/me', function (Request $request) {
    return $request->user();
});*/

Route::post('users/', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::get('users/', [UserController::class, 'index']);
Route::post('users/{id}/auth', [UserController::class, 'authenticate']);

Route::apiResource('side_projects', SideProjectController::class);

/**
 * Nested fields
 *
 * @group Dummy endpoints
 * @bodyParam data object required The data
 * @bodyParam data.name string required A string field.
 * @bodyParam data.size int A number. Example: 5
 * @bodyParam data.things string[] An array of strings
 * @bodyParam data.picture file A picture.
 * @bodyParam data.objects object[] An array of objects
 * @bodyParam data.objects[].a string A field in the array of objects
 * @bodyParam data.objects[].b string A field in the array of objects
 */
Route::post('/nested', function () {
    return [
    ];
});

/**
 * Body content array
 *
 * @group Dummy endpoints
 * @bodyParam [] object[] List of items
 * @bodyParam [].row_id string A unique ID. Example: 700
 * @bodyParam [].name string required An element name. Example: My item name
 * @bodyParam [].picture file An optional picture of the element.
 */
Route::post('/array-body', function () {
    return [
    ];
});

/**
 * File input
 *
 * @group Dummy endpoints
 * @bodyParam the_file file required Just a file.
 * @bodyParam nested object required
 * @bodyParam nested._string string required A nested string.
 * @bodyParam nested._file file required A nested file.
 */
Route::post('/file-input', function () {
    return [
    ];
});
