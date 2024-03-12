<?php

use App\Http\Controllers\ApiHolidayController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserAuthController;
use App\Models\Holiday_plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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


Route::get('plans', [ApiHolidayController::class, "index"])->middleware('auth:sanctum');
Route::post('plans', [ ApiHolidayController::class, "store"])->middleware('auth:sanctum');
Route::get('plans/{id}', [ApiHolidayController::class, "show"])->middleware('auth:sanctum');
Route::put('plans/{id}', [ApiHolidayController::class, "update"])->middleware('auth:sanctum');
Route::delete('plans/{id}', [ApiHolidayController::class, "destroy"])->middleware('auth:sanctum');

Route::get('generate/{id}', [PDFController::class, "generate"])->name('api.generate-pdf')->middleware('auth:sanctum');


Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);

