<?php

use App\Http\Controllers\Backoffice\Mall\MallController;
use Illuminate\Support\Facades\Route;

Route::apiResource('malls', MallController::class);
