<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AttendanceController;

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
Route::middleware('auth')->group(function () {
    // 
    Route::get('/', [RegisteredUserController::class, 'stamp']);
    
    Route::post('/start', [RegisteredUserController::class, 'start']);
    Route::post('/break_start', [RegisteredUserController::class, 'break_start']);
    Route::post('/break_end', [RegisteredUserController::class, 'break_end']);
    Route::post('/end', [RegisteredUserController::class, 'end']);

    Route::get('/attendance', [AttendanceController::class,'index'])->name('attendance');
    Route::get('/return', [AttendanceController::class,'return']);
    // Route::get('/return', [AttendanceController::class,'return_get']);
    //Route::post('/return', [AttendanceController::class,'return']);
    Route::get('/advance', [AttendanceController::class,'advance']);
});


