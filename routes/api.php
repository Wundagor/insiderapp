<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

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

Route::name('api.')->group(function() {
    Route::get('/', [ApiController::class, 'index'])->name('index');
    Route::post('/play', [ApiController::class, 'simulate'])->name('simulate');
    Route::post('/reset', [ApiController::class, 'reset'])->name('reset');
});
