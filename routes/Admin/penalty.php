<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/penalty', [\App\Http\Controllers\PenaltyController::class, 'index'])
    ->name('penalty');
Route::get('/admin/checkout_penalty', [\App\Http\Controllers\PenaltyController::class, 'check_out_penalty'])
    ->name('checkout_penalty');
Route::post('/admin/penalty/update', [\App\Http\Controllers\PenaltyController::class, 'penalty_ticket'])
    ->name('update_tickett');
