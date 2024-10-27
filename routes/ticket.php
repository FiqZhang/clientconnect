<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::middleware('auth')->group(function () {
    Route::resource('tickets', TicketController::class);
    Route::get('/tickets/export', [TicketController::class, 'export'])->name('tickets.export');


});