<?php

namespace App\Providers;

use App\Support\Database\EnsureSqliteDatabaseExists;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->booted(fn () => app(EnsureSqliteDatabaseExists::class)(config('database.default')));

        Model::unguard();

        Flash::levels([
            'success' => 'success',
            'error' => 'error',
        ]);
    }
}
