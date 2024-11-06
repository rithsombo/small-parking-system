<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::get('/', function () {
    return view('ticket.Login');
});

Route::get('admin/user', function () {
    $data = [];
    return view('user', ['data'=>$data]);
});
Route::get('admin/ticket', function () {
    $data = [];
    return view('ticket', ['data'=>$data]);
});
Route::get('admin/penalty', function () {
    $data = [];
    return view('ticket', ['data'=>$data]);
});
Route::get('admin/history', function () {
    $data = [];
    return view('history', ['data'=>$data]);
});
include 'Admin/user.php';
include 'Admin/ticket.php';
include 'Admin/penalty.php';
include 'Admin/history.php';
