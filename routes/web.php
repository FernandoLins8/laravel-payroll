<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TimecardController;

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


// Employee
Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/create', [EmployeeController::class, 'store'])->name('store-employee');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('destroy');

// Timecard
Route::get('/timecard', [TimecardController::class, 'index']);
Route::post('/timecard/create', [TimecardController::class, 'create'])->name('create-timecard');
Route::post('/timecard/save', [TimecardController::class, 'store'])->name('store-timecard');

// Sell
Route::get('/sell', [SellController::class, 'index']);
Route::post('/sell/create', [SellController::class, 'create'])->name('create-sell');
Route::post('/sell/save', [SellController::class, 'store'])->name('store-sell');

// Service
Route::get('/service', [ServiceController::class, 'index']);
Route::post('/service/create', [ServiceController::class, 'create'])->name('create-service');
Route::post('/service/save', [ServiceController::class, 'store'])->name('store-service');

// Schedule
Route::get('/schedule', [ScheduleController::class, 'index']);
Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('create-schedule');
Route::post('/schedule/save', [ScheduleController::class, 'store'])->name('store-schedule');
Route::delete('/schedule/delete/{id}', [ScheduleController::class, 'destroy'])->name('destroy-schedule');