<?php

use App\Http\Controllers\BomController;
use App\Http\Controllers\BuildOrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartController;
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
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/create', [CategoryController::class, 'category_create']);

Route::get('/location', [LocationController::class, 'index']);
Route::get('/location/create', [LocationController::class, 'create']);
Route::post('/location/create', [LocationController::class, 'location_create']);

Route::get('/build_orders', [BuildOrderController::class, 'index']);
Route::get('/build_orders/{id}', [BuildOrderController::class, 'read']);
Route::get('/build_orders/create', [BuildOrderController::class, 'create']);

Route::get('/bill_of_material', [BomController::class, 'index']);
Route::get('/bill_of_material/1', [BomController::class, 'read']);
Route::get('/bill_of_material/create', [BomController::class, 'create']);

Route::get('/part', [PartController::class, 'index'])->name('part.view');
Route::get('/part/create', [PartController::class, 'create']);
Route::post('/part/create', [PartController::class, 'part_create']);
Route::get('/part/{id}', [PartController::class, 'read'])->name('part_details.view');

Route::get('/part/{id}/add', [PartController::class, 'add_stock_view']);
Route::post('/part/{id}/add', [PartController::class, 'add_stock']);

Route::get('/part/{id}/edit', [PartController::class, 'edit']);
Route::get('/part/{id}/delete', [PartController::class, 'delete']);

Route::get('/scan', [ScanController::class, 'index']);
Route::get('/orders', [OrderController::class, 'index']);