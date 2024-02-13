<?php

use App\Http\Controllers\api\ApiController;
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


Route::get('/category/{slug}', [ApiController::class, 'getCategoryBySlug']);
Route::get('/categories', [ApiController::class, 'getCategories']);

Route::get('/video/{slug}', [ApiController::class, 'getVideoBySlug']);
Route::get('/videos', [ApiController::class, 'getVideos']);
