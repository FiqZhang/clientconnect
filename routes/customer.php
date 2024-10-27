<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InteractionController;

Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('customers.interactions', InteractionController::class)->only([
        'index', 'create', 'store'
    ]);
});