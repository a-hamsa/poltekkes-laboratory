<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryClinicsController;
use App\Models\InventoryClinics;

Route::get('/', function () {
    return view('laboratorium');
})->name('laboratorium');;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/banner', [DashboardController::class, 'banner'])->name('dashboardbanner')->middleware('auth');
Route::get('/dashboard/description', [DashboardController::class, 'desc'])->name('dashboarddesc')->middleware('auth');
Route::get('/dashboard/schedule', [DashboardController::class, 'schedule'])->name('dashboardschedule')->middleware('auth');


Route::post('/banner', [DashboardController::class, 'updateBanner'])->name('dashboard.banner')->middleware('auth');
Route::post('/desc', [DashboardController::class, 'updateDescription'])->name('dashboard.desc')->middleware('auth');
Route::post('/schedule', [DashboardController::class, 'updateSchedule'])->name('dashboard.schedule')->middleware('auth');


// Inventory routes
Route::get('/dashboard/inventory', [InventoryClinicsController::class, 'index'])->name('inventory.index');
Route::get('/dashboard/inventory/create', [InventoryClinicsController::class, 'create'])->name('inventory.create');
Route::post('/dashboard/inventory', [InventoryClinicsController::class, 'store'])->name('inventory.store');
Route::get('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'show'])->name('inventory.show');
Route::get('/dashboard/inventory/{id}/edit', [InventoryClinicsController::class, 'edit'])->name('inventory.edit');
Route::put('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'update'])->name('inventory.update');
Route::delete('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'destroy'])->name('inventory.destroy');