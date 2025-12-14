<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('pasiens', PasienController::class);
Route::apiResource('dokters', DokterController::class);
Route::apiResource('obats', ObatController::class);
