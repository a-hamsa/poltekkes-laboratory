<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardPreController;
use App\Http\Controllers\Admin\InventoryClinicsController;
use App\Http\Controllers\Admin\InventoryPreclinisController;
use App\Http\Controllers\Admin\StokClinicController;
use App\Http\Controllers\Admin\StokPreclinicController;

Route::get('/', function () {
    return view('home');
})->name('home');;

Route::get('/test', function () {
    return view('test');
});;

Route::get('klinik', [KlinikController::class, 'index'])->name('klinik');
Route::get('preklinik', [KlinikController::class, 'index'])->name('preklinik');
Route::get('klinik/inventory', [InventoryController::class, 'index'])->name('klinik.inventory');
Route::get('preklinik/inventory', [InventoryController::class, 'index'])->name('preklinik.inventory');

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
Route::get('/dashboard/absen', [DashboardController::class, 'absen'])->name('dashboardabsen')->middleware('auth');

//post
Route::post('/banner', [DashboardController::class, 'updateBanner'])->name('dashboard.banner')->middleware('auth');
Route::post('/desc', [DashboardController::class, 'updateDescription'])->name('dashboard.desc')->middleware('auth');
Route::post('/schedule', [DashboardController::class, 'updateSchedule'])->name('dashboard.schedule')->middleware('auth');
Route::post('/dosen', [DashboardController::class, 'updateDosen'])->name('dashboard.dosen')->middleware('auth');
Route::post('/tatib', [DashboardController::class, 'updateTatib'])->name('dashboard.tatib')->middleware('auth');
Route::post('/sop', [DashboardController::class, 'updateSop'])->name('dashboard.sop')->middleware('auth');
Route::post('/absen', [DashboardController::class, 'updateAbsen'])->name('dashboard.absen')->middleware('auth');

// Inventory routes
Route::get('/dashboard/inventory', [InventoryClinicsController::class, 'index'])->name('inventory.index');
Route::get('/dashboard/inventory/create', [InventoryClinicsController::class, 'create'])->name('inventory.create');
Route::post('/dashboard/inventory', [InventoryClinicsController::class, 'store'])->name('inventory.store');
Route::get('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'show'])->name('inventory.show');
Route::get('/dashboard/inventory/{id}/edit', [InventoryClinicsController::class, 'edit'])->name('inventory.edit');
Route::put('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'update'])->name('inventory.update');
Route::delete('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'destroy'])->name('inventory.destroy');

//STOK
Route::get('/dashboard/stok', [StokClinicController::class, 'index'])->name('stok.index');
Route::get('/dashboard/stok/create', [StokClinicController::class, 'create'])->name('stok.create');
Route::post('/dashboard/stok', [StokClinicController::class, 'store'])->name('stok.store');
Route::get('/dashboard/stok/{id}', [StokClinicController::class, 'show'])->name('stok.show');
Route::get('/dashboard/stok/{id}/edit', [StokClinicController::class, 'edit'])->name('stok.edit');
Route::put('/dashboard/stok/{id}', [StokClinicController::class, 'update'])->name('stok.update');
Route::delete('/dashboard/stok/{id}', [StokClinicController::class, 'destroy'])->name('stok.destroy');


//PRE-KLINIK
//get
Route::get('/dashboard/pre/banner', [DashboardPreController::class, 'banner'])->name('prebanner')->middleware('auth');
Route::get('/dashboard/pre/description', [DashboardPreController::class, 'desc'])->name('predesc')->middleware('auth');
Route::get('/dashboard/pre/schedule', [DashboardPreController::class, 'schedule'])->name('preschedule')->middleware('auth');
Route::get('/dashboard/pre/dosen', [DashboardPreController::class, 'dosen'])->name('predosen')->middleware('auth');
Route::get('/dashboard/pre/tatib', [DashboardPreController::class, 'tatib'])->name('pretatib')->middleware('auth');
Route::get('/dashboard/pre/sop', [DashboardPreController::class, 'sop'])->name('presop')->middleware('auth');
Route::get('/dashboard/preabsen', [DashboardPreController::class, 'absen'])->name('preabsen')->middleware('auth');

//post
Route::post('/prebanner', [DashboardPreController::class, 'updateBanner'])->name('pre.banner')->middleware('auth');
Route::post('/predesc', [DashboardPreController::class, 'updateDescription'])->name('pre.desc')->middleware('auth');
Route::post('/preschedule', [DashboardPreController::class, 'updateSchedule'])->name('pre.schedule')->middleware('auth');
Route::post('/predosen', [DashboardPreController::class, 'updateDosen'])->name('pre.dosen')->middleware('auth');
Route::post('/pretatib', [DashboardPreController::class, 'updateTatib'])->name('pre.tatib')->middleware('auth');
Route::post('/presop', [DashboardPreController::class, 'updateSop'])->name('pre.sop')->middleware('auth');
Route::post('/preabsen', [DashboardPreController::class, 'updateAbsen'])->name('dashboard.preabsen')->middleware('auth');

// Inventory routes
Route::get('/dashboard/pre/inventory', [InventoryPreclinisController::class, 'index'])->name('preinventory.index');
Route::get('/dashboard/pre/inventory/create', [InventoryPreclinisController::class, 'create'])->name('preinventory.create');
Route::post('/dashboard/pre/inventory', [InventoryPreclinisController::class, 'store'])->name('preinventory.store');
Route::get('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'show'])->name('preinventory.show');
Route::get('/dashboard/pre/inventory/{id}/edit', [InventoryPreclinisController::class, 'edit'])->name('preinventory.edit');
Route::put('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'update'])->name('preinventory.update');
Route::delete('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'destroy'])->name('preinventory.destroy');

//STOK
Route::get('/dashboard/pre/stok', [StokPreclinicController::class, 'index'])->name('prestok.index');
Route::get('/dashboard/pre/stok/create', [StokPreclinicController::class, 'create'])->name('prestok.create');
Route::post('/dashboard/pre/stok', [StokPreclinicController::class, 'store'])->name('prestok.store');
Route::get('/dashboard/pre/stok/{id}', [StokPreclinicController::class, 'show'])->name('prestok.show');
Route::get('/dashboard/pre/stok/{id}/edit', [StokPreclinicController::class, 'edit'])->name('prestok.edit');
Route::put('/dashboard/pre/stok/{id}', [StokPreclinicController::class, 'update'])->name('prestok.update');
Route::delete('/dashboard/pre/stok/{id}', [StokPreclinicController::class, 'destroy'])->name('prestok.destroy');