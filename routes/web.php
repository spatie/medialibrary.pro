<?php

use App\Http\Front\Controllers\Demo\AttachmentDemoController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\SubscribeToEmailListController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use Spatie\MediaLibraryPro\Http\Controllers\MediaLibraryUploadController;

Route::get('/', HomeController::class);
Route::post('subscribe', SubscribeToEmailListController::class)->middleware(ProtectAgainstSpam::class);

Route::view('terms-of-use', 'front.legal.terms-of-use')->name('termsOfUse');
Route::view('privacy', 'front.legal.privacy')->name('privacy');

Route::redirect('demo', 'demo-attachment')->name('demo');

Route::get('demo-attachment', [AttachmentDemoController::class, 'create']);
Route::post('demo-attachment', [AttachmentDemoController::class, 'store']);

Route::post('temp-upload', MediaLibraryUploadController::class)->name('media-library-upload');
