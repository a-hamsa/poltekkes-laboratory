<?php

use App\Models\SopClinic;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\Admin\SopController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PreklinikController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\StudentListClinic;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StokClinicController;
use App\Http\Controllers\Admin\DashboardPreController;
use App\Http\Controllers\Admin\AbsensiClinicController;
use App\Http\Controllers\Admin\StokPreclinicController;
use App\Http\Controllers\Admin\InventoryClinicsController;
use App\Http\Controllers\Admin\InventoryPreclinisController;
use App\Http\Controllers\Admin\ScheduleController;

Route::get('/', function () {
    return view('home');
})->name('home');;

Route::get('klinik', [KlinikController::class, 'index'])->name('klinik');
Route::get('preklinik', [PreklinikController::class, 'index'])->name('preklinik');
Route::get('klinik/inventory', [KlinikController::class, 'inventory'])->name('klinik.inventory');
Route::get('preklinik/inventory', [PreklinikController::class, 'inventory'])->name('preklinik.inventory');
Route::get('klinik/stock', [KlinikController::class, 'stock'])->name('klinik.stock');
Route::get('preklinik/stock', [PreklinikController::class, 'stock'])->name('preklinik.stock');
Route::get('sop&IK', [KlinikController::class, 'sop'])->name('sop');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


//KLINIK
//get
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/banner', [DashboardController::class, 'banner'])->name('dashboardbanner')->middleware('auth');
Route::get('/dashboard/description', [DashboardController::class, 'desc'])->name('dashboarddesc')->middleware('auth');
// Route::get('/dashboard/schedule', [DashboardController::class, 'schedule'])->name('dashboardschedule')->middleware('auth');
Route::get('/dashboard/dosen', [DashboardController::class, 'dosen'])->name('dashboarddosen')->middleware('auth');
Route::get('/dashboard/tatib', [DashboardController::class, 'tatib'])->name('dashboardtatib')->middleware('auth');
// Route::get('/dashboard/sop', [DashboardController::class, 'sop'])->name('dashboardsop')->middleware('auth');
Route::get('/dashboard/absen', [DashboardController::class, 'absen'])->name('dashboardabsen')->middleware('auth');

//post
Route::post('/banner', [DashboardController::class, 'updateBanner'])->name('dashboard.banner')->middleware('auth');
Route::post('/desc', [DashboardController::class, 'updateDescription'])->name('dashboard.desc')->middleware('auth');
// Route::post('/schedule', [DashboardController::class, 'updateSchedule'])->name('dashboard.schedule')->middleware('auth');
Route::post('/dosen', [DashboardController::class, 'updateDosen'])->name('dashboard.dosen')->middleware('auth');
Route::post('/tatib', [DashboardController::class, 'updateTatib'])->name('dashboard.tatib')->middleware('auth');
Route::post('/sop', [DashboardController::class, 'updateSop'])->name('dashboard.sop')->middleware('auth');
Route::post('/absen', [DashboardController::class, 'updateAbsen'])->name('dashboard.absen')->middleware('auth');

//SOP & IK
Route::get('/dashboard/sop', [SopController::class, 'index'])->name('sop.index')->middleware('auth');
Route::get('/dashboard/sop/create', [SopController::class, 'create'])->name('sop.create')->middleware('auth');
Route::post('/dashboard/sop', [SopController::class, 'store'])->name('sop.store')->middleware('auth');
Route::get('/dashboard/sop/{id}/edit', [SopController::class, 'edit'])->name('sop.edit')->middleware('auth');
Route::put('/dashboard/sop/{id}', [SopController::class, 'update'])->name('sop.update')->middleware('auth');
Route::delete('/dashboard/sop/{id}', [SopController::class, 'destroy'])->name('sop.destroy')->middleware('auth');

// Inventory routes
Route::get('/dashboard/inventory', [InventoryClinicsController::class, 'index'])->name('inventory.index')->middleware('auth');
Route::get('/dashboard/inventory/create', [InventoryClinicsController::class, 'create'])->name('inventory.create')->middleware('auth');
Route::post('/dashboard/inventory', [InventoryClinicsController::class, 'store'])->name('inventory.store')->middleware('auth');
Route::get('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'show'])->name('inventory.show')->middleware('auth');
Route::get('/dashboard/inventory/{id}/edit', [InventoryClinicsController::class, 'edit'])->name('inventory.edit')->middleware('auth');
Route::put('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'update'])->name('inventory.update')->middleware('auth');
Route::delete('/dashboard/inventory/{id}', [InventoryClinicsController::class, 'destroy'])->name('inventory.destroy')->middleware('auth');

//STOK
Route::get('/dashboard/stok', [StokClinicController::class, 'index'])->name('stok.index')->middleware('auth');
Route::get('/dashboard/stok/create', [StokClinicController::class, 'create'])->name('stok.create')->middleware('auth');
Route::post('/dashboard/stok', [StokClinicController::class, 'store'])->name('stok.store')->middleware('auth');
Route::get('/dashboard/stok/{id}', [StokClinicController::class, 'show'])->name('stok.show')->middleware('auth');
Route::get('/dashboard/stok/{id}/edit', [StokClinicController::class, 'edit'])->name('stok.edit')->middleware('auth');
Route::put('/dashboard/stok/{id}', [StokClinicController::class, 'update'])->name('stok.update')->middleware('auth');
Route::delete('/dashboard/stok/{id}', [StokClinicController::class, 'destroy'])->name('stok.destroy')->middleware('auth');


//STUDENT
Route::get('/dashboard/student', [StudentListClinic::class, 'index'])->name('student.index')->middleware('auth');
Route::get('/dashboard/student/create', [StudentListClinic::class, 'create'])->name('student.create')->middleware('auth');
Route::post('/dashboard/student', [StudentListClinic::class, 'store'])->name('student.store')->middleware('auth');
Route::get('/dashboard/student/{id}', [StudentListClinic::class, 'show'])->name('student.show')->middleware('auth');
Route::get('/dashboard/student/{id}/edit', [StudentListClinic::class, 'edit'])->name('student.edit')->middleware('auth');
Route::put('/dashboard/student/{id}', [StudentListClinic::class, 'update'])->name('student.update')->middleware('auth');
Route::delete('/dashboard/student/{id}', [StudentListClinic::class, 'destroy'])->name('student.destroy')->middleware('auth');
Route::post('/dashboard/student/import', [StudentListClinic::class, 'import'])->name('student.import')->middleware('auth');

//ABSENTS
Route::get('/dashboard/absensi', [AbsensiClinicController::class, 'index'])->name('absensi.index')->middleware('auth');
Route::post('/dashboard/semester', [AbsensiClinicController::class, 'storeSemester'])->name('semester.store')->middleware('auth');
Route::delete('/dashboard/semester/{id}', [AbsensiClinicController::class, 'destroySemester'])->name('semester.destroy')->middleware('auth');
Route::get('/absensi', [AbsensiClinicController::class, 'createAbsentStatus'])->name('absensi.create')->middleware('auth');
Route::post('/absensi', [AbsensiClinicController::class, 'storeAbsentStatus'])->name('absensi.store')->middleware('auth');

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
Route::get('/dashboard/pre/inventory', [InventoryPreclinisController::class, 'index'])->name('preinventory.index')->middleware('auth');
Route::get('/dashboard/pre/inventory/create', [InventoryPreclinisController::class, 'create'])->name('preinventory.create')->middleware('auth');
Route::post('/dashboard/pre/inventory', [InventoryPreclinisController::class, 'store'])->name('preinventory.store')->middleware('auth');
Route::get('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'show'])->name('preinventory.show')->middleware('auth');
Route::get('/dashboard/pre/inventory/{id}/edit', [InventoryPreclinisController::class, 'edit'])->name('preinventory.edit')->middleware('auth');
Route::put('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'update'])->name('preinventory.update')->middleware('auth');
Route::delete('/dashboard/pre/inventory/{id}', [InventoryPreclinisController::class, 'destroy'])->name('preinventory.destroy')->middleware('auth');

//STOK
Route::get('/dashboard/pre/stok', [StokPreclinicController::class, 'index'])->name('prestok.index')->middleware('auth');
Route::get('/dashboard/pre/stok/create', [StokPreclinicController::class, 'create'])->name('prestok.create')->middleware('auth');
Route::post('/dashboard/pre/stok', [StokPreclinicController::class, 'store'])->name('prestok.store')->middleware('auth');
Route::get('/dashboard/pre/stok/{id}', [StokPreclinicController::class, 'show'])->name('prestok.show')->middleware('auth');
Route::get('/dashboard/pre/stok/{id}/edit', [StokPreclinicController::class, 'edit'])->name('prestok.edit')->middleware('auth');
Route::put('/dashboard/pre/stok/{id}', [StokPreclinicController::class, 'update'])->name('prestok.update')->middleware('auth');
Route::delete('/dashboard/pre/stok/{id}', [StokPreclinicController::class, 'destroy'])->name('prestok.destroy')->middleware('auth');

// Route::resource('schedules', ScheduleController::class);
Route::get('/jadwal', [KlinikController::class, 'jadwal'])->name('jadwal')->middleware('auth');
Route::get('/dashboard/schedule', [ScheduleController::class, 'index'])->name('schedules.index')->middleware('auth');
Route::get('/dashboard/schedule/create', [ScheduleController::class, 'create'])->name('schedules.create')->middleware('auth');
Route::post('/dashboard/schedule', [ScheduleController::class, 'store'])->name('schedules.store')->middleware('auth');
Route::get('/dashboard/schedule/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit')->middleware('auth');
Route::put('/dashboard/schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update')->middleware('auth');
Route::delete('/dashboard/schedule/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy')->middleware('auth');
