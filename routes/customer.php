<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InteractionController;

Route::middleware('auth')->group(function () {
    Route::get('/customers/trash', [CustomerController::class, 'trashed'])->name('customers.trashed');
    Route::get('/customers/{id}/restore', [CustomerController::class, 'restore'])->name('customers.restore');
    Route::resource('customers', CustomerController::class);
    Route::resource('customers.interactions', InteractionController::class)->only([
        'index', 'create', 'store'
    ]);
    

});