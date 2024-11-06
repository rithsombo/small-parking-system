<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/history', [\App\Http\Controllers\TicketController::class, 'history'])->name('history');
