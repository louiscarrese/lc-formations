<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\ModuleRepository;

class ModuleRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\ModuleRepositoryInterface', function($app) {
            return new ModuleRepository($app, $this->app->make('ModuleFormation\Repositories\FormateurRepositoryInterface'));
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\ModuleRepositoryInterface'];
    }

}