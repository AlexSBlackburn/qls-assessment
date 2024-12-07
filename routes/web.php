<?php

use App\Http\Controllers\ShippingLabelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShippingLabelController::class, 'create']);
Route::post('/', [ShippingLabelController::class, 'store']);
