<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/ticket', [\App\Http\Controllers\TicketController::class, 'index'])->name('ticket');
Route::get('/admin/ticket/ticket_register', [\App\Http\Controllers\TicketController::class, 'index_register'])
    ->name('index_register');
Route::post('/admin/ticket/create', [\App\Http\Controllers\TicketController::class, 'create'])
    ->name('ticket_register');
Route::get('/admin/checkout', [\App\Http\Controllers\TicketController::class, 'check_out'])
    ->name('checkout');
Route::get('/admin/checkout_form', [\App\Http\Controllers\TicketController::class, 'check_out_form'])
    ->name('checkout_form');
Route::post('/admin/ticket/update', [\App\Http\Controllers\TicketController::class, 'update_ticket'])
    ->name('update_ticket');
