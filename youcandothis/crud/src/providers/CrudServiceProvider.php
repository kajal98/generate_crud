<?php

namespace Youcandothis\Crud;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Youcandothis\Crud\Http\Middleware\AdminOnly;
use Youcandothis\Crud\Src\Commands\GenerateCrud;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(Router $router): void
    {
        $router->aliasMiddleware('admin', AdminOnly::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateCrud::class,
            ]);
        }

        $src = dirname(__DIR__);

        $this->publishes([
            $src.'/public/css' => public_path('css'),
            $src.'/public/js' => public_path('js'),
            $src.'/public/fonts' => public_path('fonts'),
            $src.'/public/images' => public_path('images'),
            $src.'/public/plupload' => public_path('plupload'),
        ], ['crud', 'crud-assets']);

        $this->publishes([
            $src.'/views' => resource_path('views'),
        ], ['crud', 'crud-views']);

        $this->publishes([
            $src.'/controllers' => app_path('Http/Controllers'),
            $src.'/models' => app_path('Models'),
            $src.'/web.php' => base_path('routes/crud.php'),
        ], ['crud', 'crud-app']);

        $this->publishes([
            $src.'/migrations' => database_path('migrations'),
            $src.'/seeder' => database_path('seeders'),
        ], ['crud', 'crud-database']);
    }
}
