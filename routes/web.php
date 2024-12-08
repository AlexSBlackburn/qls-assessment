<?php

use App\Http\Controllers\PackingSlipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PackingSlipController::class, 'create']);
Route::post('/', [PackingSlipController::class, 'store']);
