<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AccountController;
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

Route::prefix('admin')->group(function () {
    // //  Role
    // Route::get('role',                  [RoleController::class, "index"])->name('admin.role');

    // Dashboard
    Route::get("dashboard", [DashboardController::class, 'index'])->name("admin.dashboard");

    // // Profile
    // Route::get('profile',               [ProfileAdminController::class, "index"])->name('admin.profile');

    // // Account
    // Route::get('account/{id?}',         [AccountController::class, "index"])->where(['id' => '[0-9]+'])->name('admin.account');
    // Route::post('account/update-status', [AccountController::class, 'updateStatus'])->name('admin.account.updateStatus');

    // Config
    Route::prefix('config')->group(function () {
        // Location
        Route::get('location',              [LocationController::class, "index"])->name('admin.config.location');
        Route::post('location/import',      [LocationController::class, 'runImportManually'])->name('admin.config.location.import');
    });
});
