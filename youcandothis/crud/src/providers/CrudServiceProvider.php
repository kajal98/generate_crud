<?php

namespace Youcandothis\Crud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/../routes.php';
        if ($this->app->runningInConsole()) {
            $this->commands([
                Src\Commands\GenerateCrud::class,
            ]);
        }
        $this->publishes([
            __DIR__.'/../public/css' => base_path('public/css'),
            __DIR__.'/../public/js' => base_path('public/js'),
            __DIR__.'/../public/fonts' => base_path('public/fonts'),
            __DIR__.'/../public/images' => base_path('public/images'),
            __DIR__.'/../views' => base_path('resources/views'),
            __DIR__.'/../controllers' => base_path('app/Http/Controllers'),
            __DIR__.'/../models' => base_path('app'),
            __DIR__.'/../middlewares' => base_path('app/Http/Middleware'),
            __DIR__.'/../migrations' => base_path('database/migrations'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$this->commands('Crud\Src\Commands\GenerateCrud');
    }

}
