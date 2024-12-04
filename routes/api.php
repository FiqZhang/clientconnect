<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\ListController;

Route::get('/message', [MessageController::class, 'showMessage']);

Route::get('/list', [ListController::class, 'showList']);

