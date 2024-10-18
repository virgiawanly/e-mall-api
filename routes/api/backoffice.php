<?php

use App\Http\Controllers\Backoffice\Auth\LoginController;
use App\Http\Controllers\Backoffice\Mall\MallController;
use App\Http\Controllers\Backoffice\Tenant\TenantController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('malls', MallController::class);
    Route::apiResource('tenants', TenantController::class);
});
