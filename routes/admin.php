<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Config\LocationController;
use App\Http\Controllers\Admin\Config\ToggleThemeController;
use App\Http\Controllers\Admin\Config\ToggleMenuController;
use App\Http\Controllers\Admin\Account\StudentController;
use App\Http\Controllers\Admin\Account\TeacherController;
use App\Http\Controllers\Admin\Account\ActivityLogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\ProfileAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')
    ->middleware('auth') // <-- thêm middleware ở đây
    ->group(function () {
        // Dashboard
        Route::get("dashboard", [DashboardController::class, 'index'])->name("admin.dashboard");

        // Account
        Route::prefix('account')->group(function () {
            // Học sinh
            Route::prefix('student')->group(function () {
                Route::get('', [StudentController::class, "index"])
                    ->name('admin.account.student');
            });

            // Giáo viên
            Route::prefix('teacher')->group(function () {
                Route::get('',)
                    ->name('admin.account.teacher');
            });

            // Nhật ký hoạt động
            Route::prefix('activity-log')->group(function () {
                Route::get('', [ActivityLogController::class, "index"])
                    ->name('admin.account.activity-log');
            });
        });

        // Config
        Route::prefix('config')->group(function () {
            Route::prefix('job')->group(function () {
                // Location
                Route::get('location', [LocationController::class, "index"])->name('admin.config.job.location');
                Route::post('location/import', [LocationController::class, 'runImportManually'])->name('admin.config.job.location.import');
            });
        });
    });
