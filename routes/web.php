<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Position\PositionController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Language;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Middleware\checkReferrer;
use App\Http\Middleware\MultipleLanguage;

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

// Route::get('lang/change', [Language::class, 'index'])->name('changeLang');


Route::get('lang-change', [LanguageController::class, 'index'])->name('changeLang');

Route::middleware(MultipleLanguage::class)->group(function () {

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
    // Route::middleware(MultipleLanguage::class)->group(function () {
        Route::get('/', [DashBoardController::class, 'index'])->name('dashborad.index');
        Route::post('/log-out', [AuthController::class, 'logout'])->name('logout');
        // User
        Route::get('/list-user', [UserController::class, 'index'])->name('user.index')->middleware(MultipleLanguage::class);
        Route::post('/list-user', [UserController::class, 'store'])->name('user.store');
        Route::get('/modalEditUser/{id}', [UserController::class, 'modalEdit'])->name('user.modalEdit');
        Route::put('/update-user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/modalDeleteUser/{id}', [UserController::class, 'modalDelete'])->name('user.modalDelete');
        Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete.user');

        // Department
        Route::get('/list-department', [DepartmentController::class, 'index'])->name('department.list');
        Route::post('/store-department', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/modalEditDepartment/{id}', [DepartmentController::class, 'modalEdit'])->name('department.modalEdit');
        Route::put('/update-department/{id}', [DepartmentController::class, 'update'])->name('department.update');
        Route::get('/modalDeleteDepartment/{id}', [DepartmentController::class, 'modalDelete'])->name('department.modalDelete');
        Route::delete('/delete-department/{id}', [DepartmentController::class, 'destroy'])->name('delete.department');

        // Position
        Route::get('/list-position', [PositionController::class, 'index'])->name('position.list');
        Route::post('/store-position', [PositionController::class, 'store'])->name('position.store');
        Route::get('/modalEditPosition/{id}', [PositionController::class, 'modalEdit'])->name('position.modalEdit');
        Route::put('/update-position/{id}', [PositionController::class, 'update'])->name('position.update');
        Route::get('/modalDeletePosition/{id}', [PositionController::class, 'modalDelete'])->name('position.modalDelete');
        Route::delete('/delete-position/{id}', [PositionController::class, 'destroy'])->name('delete.position');

        // Role
        Route::get('/list-role', [RoleController::class, 'index'])->name('role.list');
        Route::post('/store-role', [RoleController::class, 'store'])->name('role.store');
        Route::get('/modalEditRole/{id}', [RoleController::class, 'modalEdit'])->name('role.modalEdit');
        Route::put('/update-role/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('/modalDeleteRole/{id}', [RoleController::class, 'modalDelete'])->name('role.modalDelete');
        Route::delete('/delete-role/{id}', [RoleController::class, 'destroy'])->name('delete.role');

        // Permission
        Route::get('/list-permission', [PermissionController::class, 'index'])->name('permission.list');
        Route::post('/store-permission', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('/modalEditPermission/{id}', [PermissionController::class, 'modalEdit'])->name('permission.modalEdit');
        Route::put('/update-permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('/modalDeletePermission/{id}', [PermissionController::class, 'modalDelete'])->name('permission.modalDelete');
        Route::delete('/delete-permission/{id}', [PermissionController::class, 'destroy'])->name('delete.permission');

        Route::get('/role/{id}', [RolePermissionController::class, 'rolePermission'])->name('rolePermission.list');
        Route::put('/update-role-permission/{id}', [RolePermissionController::class, 'updateRolePermission'])->name('rolePermission.updateRolePermission');
    });
});

