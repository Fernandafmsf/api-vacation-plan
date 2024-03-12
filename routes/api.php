<?php

use App\Http\Controllers\ApiHolidayController;
use App\Models\Holiday_plan;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('plans', [ApiHolidayController::class, "index"]);
Route::post('plans', [ ApiHolidayController::class, "store"]);
Route::get('plans/{id}', [ApiHolidayController::class, "show"]);
Route::put('plans/{id}', [ApiHolidayController::class, "update"]);
Route::delete('plans/{id}', [ApiHolidayController::class, "destroy"]);