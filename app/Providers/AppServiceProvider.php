<?php

namespace App\Providers;

use App\Models\User;
use App\Support\Satis\Satis;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Model::unguard();

        Gate::define('viewMailcoach', function (User $user) {
            return $user->admin;
        });

        app()->singleton(Satis::class, function () {
            return new Satis(new Client([
                'auth' => ['user', config('services.satis.license')]
            ]));
        });

        Blade::directive('markdown', function () {
            return "<?php echo (new \League\CommonMark\CommonMarkConverter())->convertToHtml(<<<HEREDOC";
        });

        Blade::directive('endmarkdown', function () {
            return "HEREDOC); ?>";
        });
    }
}
