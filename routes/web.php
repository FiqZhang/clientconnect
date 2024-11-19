<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/management', function () {
    return view('management');
})->middleware(['auth', 'verified'])->name('management');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tickets/{id}/file', [TicketController::class, 'viewFile'])->name('tickets.viewFile');
    Route::get('/tickets/{id}/fileDownload', [TicketController::class, 'downloadFile'])->name('tickets.downloadFile');

    // Route::resource('customers', CustomerController::class);
    // Route::resource('customers.interactions', InteractionController::class)->only([
    //     'index', 'create', 'store'
    // ]);
    // Route::resource('tickets', TicketController::class);
    // Route::get('/tickets/export', [TicketController::class, 'export'])->name('tickets.export');


});

require __DIR__.'/auth.php';
require __DIR__.'/customer.php';
require __DIR__.'/ticket.php';

