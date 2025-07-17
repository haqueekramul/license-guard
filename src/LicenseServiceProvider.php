<?php

namespace Ekram\LicenseGuard;

use Illuminate\Support\ServiceProvider;

class LicenseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/licenseguard.php', 'licenseguard');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        \Blade::if('canUse', function () {
            return License::check();
        });

        $router = $this->app['router'];
        $router->aliasMiddleware('license.guard', Middleware\LicenseMiddleware::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\CheckLicenseCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->singleton('license', function () {
            return new License();
        });
    }
}
