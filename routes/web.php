<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\TimecardController;
use Illuminate\Support\Facades\Route;

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
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('destroy');

// Timecard
Route::get('/timecard', [TimecardController::class, 'index']);
Route::post('/timecard/create', [TimecardController::class, 'create'])->name('create-timecard');
Route::post('/timecard/save', [TimecardController::class, 'store'])->name('store-timecard');

// Sell
Route::get('/sell', [SellController::class, 'index']);
Route::post('/sell/create', [SellController::class, 'create'])->name('create-sell');
Route::post('/sell/save', [SellController::class, 'store'])->name('store-sell');

Route::get('/service', function () {
    return view('service.index');
});

Route::get('/service/create', function () {
    return view('service.create');
});

Route::get('/schedule', function () {
    return view('schedule.index');
});

Route::get('/schedule/create', function () {
    return view('schedule.create');
});