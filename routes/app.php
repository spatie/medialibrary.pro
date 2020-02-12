<?php

use App\Http\App\Controllers\Account\AccountController;
use App\Http\App\Controllers\Account\PasswordController;
use App\Http\App\Controllers\AfterPaddleSaleController;
use App\Http\App\Controllers\Licenses\LicensesIndexController;
use App\Http\App\Controllers\Licenses\UpdateLicenseController;
use App\Http\App\Controllers\PurchasesIndexController;
use App\Http\App\Controllers\ReleasesController;
use App\Http\App\Controllers\Videos\VideoCompletionController;
use App\Http\App\Controllers\Videos\VideosController;

Route::get('releases', ReleasesController::class)->name('releases');
Route::get('licenses', LicensesIndexController::class)->name('licenses');
Route::get('purchases', PurchasesIndexController::class)->name('purchases');

Route::middleware('can:administer,license')->group(function () {
    Route::get('licenses/{license}/edit', [UpdateLicenseController::class, 'edit']);
    Route::put('licenses/{license}', [UpdateLicenseController::class, 'update']);
});
Route::get('after-paddle-sale', AfterPaddleSaleController::class);

Route::middleware('canAccessVideos')->group(function () {
    Route::get('video-course', [VideosController::class, 'index'])->name('video-course');
    Route::get('video-course/{chapter}/{video}', [VideosController::class, 'show'])->name('video-course.show');
    Route::post('video-course/{video}/complete', [VideoCompletionController::class, 'store']);
    Route::delete('video-course/{video}/complete', [VideoCompletionController::class, 'destroy']);
});

Route::get('account', [AccountController::class, 'index'])->name('account');
Route::put('account', [AccountController::class, 'update']);
Route::get('password', [PasswordController::class, 'index'])->name('password');
Route::put('password', [PasswordController::class, 'update']);
