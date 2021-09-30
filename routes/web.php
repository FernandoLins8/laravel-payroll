<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/sell', function () {
    return view('sell.index');
});

Route::get('/sell/create', function () {
    return view('sell.create');
});

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