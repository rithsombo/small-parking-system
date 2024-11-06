<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/user', [UserController::class, 'index'])->name('user');
Route::get('/admin/user/index_create', [UserController::class, 'index_create'])->name('createuser');
Route::post('admin/user/delete/{id}', [UserController::class, 'delete'])->name('delete_user');
Route::post('/admin/user/update', [\App\Http\Controllers\UserController::class, 'update'])->name('update_user');
Route::get('/admin/user/index_update', [\App\Http\Controllers\UserController::class, 'index_update'])->name('index_update_user');
Route::post('/admin/user/create', [\App\Http\Controllers\UserController::class, 'create'])
    ->name('create_user');
