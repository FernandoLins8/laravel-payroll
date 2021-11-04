<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TimecardController;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
  return redirect()->route('list-employees');
});

// Employee
Route::get('/employee', [EmployeeController::class, 'index'])->name('list-employees');
Route::get('/employee/show/{id}', [EmployeeController::class, 'show'])->name('show-employee');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('create-employee');
Route::post('/employee/create', [EmployeeController::class, 'store'])->name('store-employee');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('edit-employee');
Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('update-employee');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('destroy');

// Timecard
Route::get('/timecard', [TimecardController::class, 'index']);
Route::get('/timecard/employee/{id}', [TimecardController::class, 'listByEmployee'])->name('list-by-employee');
Route::post('/timecard/save', [TimecardController::class, 'store'])->name('store-timecard');
Route::delete('/timecard/delete/{id}', [TimecardController::class, 'destroy'])->name('destroy-timecard');

// Sell
Route::get('/sell', [SellController::class, 'index']);
Route::get('/sell/employee/{id}', [SellController::class, 'listByEmployee'])->name('list-sells-by-employee');
Route::post('/sell/save', [SellController::class, 'store'])->name('store-sell');
Route::delete('/sell/delete/{id}', [SellController::class, 'destroy'])->name('destroy-sell');

// Service
Route::get('/service', [ServiceController::class, 'index']);
Route::get('/service/employee/{id}', [ServiceController::class, 'listByEmployee'])->name('list-services-by-employee');
Route::post('/service/save', [ServiceController::class, 'store'])->name('store-service');
Route::delete('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('destroy-service');

// Schedule
Route::get('/schedule', [ScheduleController::class, 'index']);
Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('create-schedule');
Route::post('/schedule/save', [ScheduleController::class, 'store'])->name('store-schedule');
Route::delete('/schedule/delete/{id}', [ScheduleController::class, 'destroy'])->name('destroy-schedule');