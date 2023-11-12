<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ScanController;
use Illuminate\Support\Facades\Route;

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

//TODO CATCHALL reroute if not authenticated.
Route::get('/', function () {
    return view('login');
});


Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/inventory', [InventoryController::class, 'index']);
Route::get('/inventory/create', [InventoryController::class, 'create']);
Route::get('/inventory/1', [InventoryController::class, 'read']);
Route::get('/inventory/1/edit', [InventoryController::class, 'edit']);
Route::get('/inventory/1/delete', [InventoryController::class, 'delete']);

Route::get('/scan', [ScanController::class, 'index']);
Route::get('/printer', [PrinterController::class, 'index']);
Route::get('/orders', [OrderController::class, 'index']);