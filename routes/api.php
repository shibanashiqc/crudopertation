<?php

use App\Http\Controllers\Cron\MasslookerController;
use App\Http\Controllers\Instagram\instagramController;
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

Route::fallback(function(){
    return response()->json([
        'success' => false,
        'msg' => 'Invalid Route',
        'code' => 404,
    ], 404);
});

Route::get('/cron/run', [MasslookerController::class,'run']);

// Route::post('insta-login', [instagramController::class,'instagram_login2']);
