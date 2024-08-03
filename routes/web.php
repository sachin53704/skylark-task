<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;


// route for authentication
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'postLogin'])->name('postLogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'postRegister'])->name('postRegister');


Route::middleware(['auth'])->group(function () {
    // route for dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Route for employee
    Route::resource('employee', EmployeeController::class);
});
