<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Position\PositionController;
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
    Route::get('/', [DashBoardController::class, 'index'])->name('dashborad.index');
    Route::post('/log-out', [AuthController::class, 'logout'])->name('logout');

    // User
    Route::get('/list-user', [UserController::class, 'index'])->name('user.index');

    // Department
    Route::get('/list-department', [DepartmentController::class, 'index'])->name('department.list');

    // Position
    Route::get('/list-position', [PositionController::class, 'index'])->name('position.list');
});

