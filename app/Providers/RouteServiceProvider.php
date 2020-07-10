<?php

namespace App\Providers;

use App\Models\License;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        $this
            ->mapWebRoutes()
            ->mapAppRoutes()
            ->mapAuthRoutes()
            ->mapApiRoutes()
            ->registerBindings();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')->group(base_path('routes/web.php'));

        return $this;
    }

    protected function mapAppRoutes()
    {
        Route::middleware(['web', 'auth'])->group(base_path('routes/app.php'));

        return $this;
    }

    protected function mapAuthRoutes()
    {
        Route::middleware('web')
            ->group(base_path('routes/auth.php'));

        return $this;
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

        return $this;
    }

    protected function registerBindings()
    {
        Route::bind('licenseKey', function (string $licenseUuid) {
            return License::findByUuid($licenseUuid);
        });

        return $this;
    }
}
