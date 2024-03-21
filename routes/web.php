<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Position\PositionController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Middleware\checkReferrer;

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
Route::get('/reset-password', [AuthController::class, 'formResetPassword'])->name('Auth.formResetPassword')->middleware(checkReferrer::class);
Route::get('/change-password/{id}', [AuthController::class, 'formChangePassword'])->name('Auth.ChangePassword')->middleware(checkReferrer::class);
Route::get('/forgot-password/{id}', [ForgotPasswordController::class, 'show'])->name('forgot-password')->middleware(checkReferrer::class);
Route::post('/forgot-password/{id}', [ForgotPasswordController::class, 'checkCode'])->name('checkCode')->middleware(checkReferrer::class);
Route::post('/Check-gmail', [ForgotPasswordController::class, 'checkGmail'])->name('checkGmail')->middleware(checkReferrer::class);
Route::post('/update-password/{id}', [ForgotPasswordController::class, 'updatePassWord'])->name('updatePassWord')->middleware(checkReferrer::class);


Route::middleware(['auth', 'role:admin|user'])->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('dashborad.index');
    Route::post('/log-out', [AuthController::class, 'logout'])->name('logout');

    // User
    Route::get('/list-user', [UserController::class, 'index'])->name('user.index');
    Route::post('/list-user', [UserController::class, 'store'])->name('user.store');

    // Department
    Route::get('/list-department', [DepartmentController::class, 'index'])->name('department.list');
    Route::post('/store-department', [DepartmentController::class, 'store'])->name('department.store');

    // Position
    Route::get('/list-position', [PositionController::class, 'index'])->name('position.list');
});

