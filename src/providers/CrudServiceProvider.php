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
