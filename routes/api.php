<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Api\RegisterController;
// use App\Http\Controllers\Api\ContractController;
// use App\Http\Controllers\Api\JobController;
// use App\Http\Controllers\Api\MessageTypeController;
// use App\Http\Controllers\Api\MessageController;

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

// -- Commented out - JJ (23/08/22)
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->group( function() {
//     Route::resource('contracts', ContractController::class);
// });

  

Route::controller(App\Http\Controllers\Api\RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('contract', App\Http\Controllers\Api\ContractController::class);
    Route::resource('job', App\Http\Controllers\Api\JobController::class);
    Route::resource('messagetype', App\Http\Controllers\Api\MessageTypeController::class);
    Route::resource('message', App\Http\Controllers\Api\MessageController::class);
});

