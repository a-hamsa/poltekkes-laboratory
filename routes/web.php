<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardPreController;
use App\Http\Controllers\Admin\InventoryClinicsController;
use App\Http\Controllers\Admin\InventoryPreclinisController;

Route::get('/', function () {
    return view('laboratorium');
})->name('laboratorium');;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


//KLINIK
//get
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/banner', [DashboardController::class, 'banner'])->name('dashboardbanner')->middleware('auth');
Route::get('/dashboard/description', [DashboardController::class, 'desc'])->name('dashboarddesc')->middleware('auth');
Route::get('/dashboard/schedule', [DashboardController::class, 'schedule'])->name('dashboardschedule')->middleware('auth');
Route::get('/dashboard/dosen', [DashboardController::class, 'dosen'])->name('dashboarddosen')->middleware('auth');
Route::get('/dashboard/tatib', [DashboardController::class, 'tatib'])->name('dashboardtatib')->middleware('auth');
Route::get('/dashboard/sop', [DashboardController::class, 'sop'])->name('dashboardsop')->middleware('auth');

//post
Route::post('/banner', [DashboardController::class, 'updateBanner'])->name('dashboard.banner')->middleware('auth');
Route::post('/desc', [DashboardController::class, 'updateDescription'])->name('dashboard.desc')->middleware('auth');
Route::post('/schedule', [DashboardController::class, 'updateSchedule'])->name('dashboard.schedule')->middleware('auth');
Route::post('/dosen', [DashboardController::class, 'updateDosen'])->name('dashboard.dosen')->middleware('auth');
Route::post('/tatib', [DashboardController::class, 'updateTatib'])->name('dashboard.tatib')->middleware('auth');
Route::post('/sop', [DashboardController::class, 'updateSop'])->name('dashboard.sop')->middleware('auth');

// Inventory routes
Route::get('/dashboard/inventory', [InventoryClinicsController::class, 'index'])->name('inventory.index');
Route::get('/dashboard/inventory/create', [InventoryClinicsController::class, 'create'])->name('inventory.create');
Route::post('/dashboard/inventory', [InventoryClinicsController::class, 'store'])->name('inventory.store');
Route::get('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'show'])->name('inventory.show');
Route::get('/dashboard/inventory/{id}/edit', [InventoryClinicsController::class, 'edit'])->name('inventory.edit');
Route::put('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'update'])->name('inventory.update');
Route::delete('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'destroy'])->name('inventory.destroy');



//PRE-KLINIK
//get
Route::get('/dashboard/pre/banner', [DashboardPreController::class, 'banner'])->name('prebanner')->middleware('auth');
Route::get('/dashboard/pre/description', [DashboardPreController::class, 'desc'])->name('predesc')->middleware('auth');
Route::get('/dashboard/pre/schedule', [DashboardPreController::class, 'schedule'])->name('preschedule')->middleware('auth');
Route::get('/dashboard/pre/dosen', [DashboardPreController::class, 'dosen'])->name('predosen')->middleware('auth');
Route::get('/dashboard/pre/tatib', [DashboardPreController::class, 'tatib'])->name('pretatib')->middleware('auth');
Route::get('/dashboard/pre/sop', [DashboardPreController::class, 'sop'])->name('presop')->middleware('auth');

//post
Route::post('/prebanner', [DashboardPreController::class, 'updateBanner'])->name('pre.banner')->middleware('auth');
Route::post('/predesc', [DashboardPreController::class, 'updateDescription'])->name('pre.desc')->middleware('auth');
Route::post('/preschedule', [DashboardPreController::class, 'updateSchedule'])->name('pre.schedule')->middleware('auth');
Route::post('/predosen', [DashboardPreController::class, 'updateDosen'])->name('pre.dosen')->middleware('auth');
Route::post('/pretatib', [DashboardPreController::class, 'updateTatib'])->name('pre.tatib')->middleware('auth');
Route::post('/presop', [DashboardPreController::class, 'updateSop'])->name('pre.sop')->middleware('auth');

// Inventory routes
Route::get('/dashboard/pre/inventory', [InventoryPreclinisController::class, 'index'])->name('preinventory.index');
Route::get('/dashboard/pre/inventory/create', [InventoryPreclinisController::class, 'create'])->name('preinventory.create');
Route::post('/dashboard/pre/inventory', [InventoryPreclinisController::class, 'store'])->name('preinventory.store');
Route::get('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'show'])->name('preinventory.show');
Route::get('/dashboard/pre/inventory/{id}/edit', [InventoryPreclinisController::class, 'edit'])->name('preinventory.edit');
Route::put('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'update'])->name('preinventory.update');
Route::delete('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'destroy'])->name('preinventory.destroy');