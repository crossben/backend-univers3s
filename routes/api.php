<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\BtpController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/me', [AuthController::class, 'me']);
Route::post('/grant-access/{id}', [AuthController::class, 'grantAccess']);

Route::apiResource('contacts', ContactController::class);
Route::apiResource('travels', TravelController::class);
Route::apiResource('btps', BtpController::class);
Route::apiResource('inscriptions', InscriptionController::class);

Route::get('/users', [AuthController::class, 'listUsers'])->middleware('auth:sanctum');
