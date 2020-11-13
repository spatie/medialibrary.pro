<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Model::unguard();

        Flash::levels([
            'success' => 'success',
            'error' => 'error',
        ]);
    }
}
