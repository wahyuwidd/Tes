<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/register'); 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\RegistrationController::class, 'create' ]);
Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'store'])->name('registration.store');
Route::get('/registration/success', [RegistrationController::class, 'success'])->name('registration.success');

Route::get('/api/provinces/{province}/regencies', [App\Http\Controllers\RegistrationController::class, 'getRegencies']);
Route::get('/api/regencies/{regency}/districts', [App\Http\Controllers\RegistrationController::class, 'getDistricts']);
Route::get('/api/districts/{district}/villages', [App\Http\Controllers\RegistrationController::class, 'getVillages']);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
Route::get('/dashboard/recap', [App\Http\Controllers\DashboardController::class, 'recap']);
// Route::get('/dashboard/export', [App\Http\Controllers\DashboardController::class, 'exportExcel']);
