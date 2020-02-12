<?php

use App\Http\Api\Controllers\LatestVersionController;
use App\Http\Api\Controllers\Satis\IsValidLicenseApiKeyController;

Route::prefix('satis')->group(function () {
    Route::post('validate-license', IsValidLicenseApiKeyController::class);
});

Route::get('latest-version', LatestVersionController::class);
