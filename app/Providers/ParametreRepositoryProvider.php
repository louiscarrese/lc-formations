<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\ParametreRepository;

class ParametreRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\ParametreRepositoryInterface', function($app) {
            return new ParametreRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\ParametreRepositoryInterface'];
    }

}