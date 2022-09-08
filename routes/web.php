<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/alternate/docs', 'scribe-alternate.index')->name('scribe-alternate');

Route::get('/alternate/docs.postman', function () {
    return new JsonResponse(Storage::disk('local')->get('scribe-scribe/collection.json'), json: true);
})->name('scribe-alternate.postman');

Route::get('/alternate/docs.openapi', function () {
    return response()->file(Storage::disk('local')->path('scribe-alternate/openapi.yaml'));
})->name('scribe-alternate.openapi');
