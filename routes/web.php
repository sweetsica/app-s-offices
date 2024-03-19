<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/login', [AuthController::class, 'login'])->name('Auth.login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

// Reset password
Route::get('/reset-password', [AuthController::class, 'formResetPassword'])->name('Auth.formResetPassword');
Route::get('/change-password', [AuthController::class, 'formChangePassword'])->name('Auth.ChangePassword');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('qww');
Route::post('/forgot-password', [ForgotPasswordController::class, 'checkCode'])->name('checkCode');


Route::middleware(['auth', 'role:admin|user'])->group(function () {
    Route::get('/dashborad', [DashBoardController::class, 'index'])->name('dashborad.index');
    Route::post('/log-out', [AuthController::class, 'logout'])->name('logout');
});

