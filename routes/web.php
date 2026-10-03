<?php

use App\Http\Front\Controllers\Demo\AttachmentDemoController;
use App\Http\Front\Controllers\Demo\CollectionDemoController;
use App\Http\Front\Controllers\Demo\CustomizedCollectionDemoController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\SubscribeToEmailListController;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::withoutMiddleware([StartSession::class, ShareErrorsFromSession::class, PreventRequestForgery::class])->group(function () {
    Route::get('/', HomeController::class);
    Route::post('subscribe', SubscribeToEmailListController::class)->middleware(ProtectAgainstSpam::class);

    Route::view('terms-of-use', 'front.legal.terms-of-use')->name('termsOfUse');
    Route::view('privacy', 'front.legal.privacy')->name('privacy');

    Route::get('robots.txt', fn () => response(file_get_contents(resource_path('robots.txt')))->header('Content-Type', 'text/plain'));
});

Route::redirect('demo', 'demo-attachment')->name('demo');

Route::get('demo-attachment', [AttachmentDemoController::class, 'create'])->name('demo-attachment');
Route::post('demo-attachment', [AttachmentDemoController::class, 'store']);

Route::get('demo-collection', [CollectionDemoController::class, 'create'])->name('demo-collection');
Route::post('demo-collection', [CollectionDemoController::class, 'store']);

Route::get('demo-customized-collection', [CustomizedCollectionDemoController::class, 'create'])->name('demo-customized-collection');
Route::post('demo-customized-collection', [CustomizedCollectionDemoController::class, 'store']);

Route::mediaLibrary();
