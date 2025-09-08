<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\BtpController;
use App\Http\Controllers\InscriptionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('contacts', ContactController::class);
Route::apiResource('travels', TravelController::class);
Route::apiResource('btps', BtpController::class);
Route::apiResource('inscriptions', InscriptionController::class);
