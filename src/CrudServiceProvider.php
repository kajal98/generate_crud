<?php

namespace KajalPandya\LaravelCrud;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use KajalPandya\LaravelCrud\Console\GenerateCrudCommand;
use KajalPandya\LaravelCrud\Console\InstallCommand;
use KajalPandya\LaravelCrud\Http\Middleware\AdminOnly;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/crud.php', 'crud');
    }

    /**
     * Bootstrap services.
     */
    public function boot(Router $router): void
    {
        $router->aliasMiddleware('admin', AdminOnly::class);

        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            InstallCommand::class,
            GenerateCrudCommand::class,
        ]);

        $this->publishes([
            __DIR__.'/../config/crud.php' => config_path('crud.php'),
        ], 'crud-config');

        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'crud-migrations');

        $this->publishes([
            __DIR__.'/../resources/dist' => public_path('vendor/crud'),
        ], 'crud-assets');
    }
}
