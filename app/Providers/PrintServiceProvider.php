<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Services\PrintService;

class PrintServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Services\PrintServiceInterface', function($app) {
            return new PrintService(
                $this->app->make('ModuleFormation\Repositories\InscriptionRepositoryInterface')
            );
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Services\PrintServiceInterface'];
    }

}