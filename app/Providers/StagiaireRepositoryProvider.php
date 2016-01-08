<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\StagiaireRepository;

class StagiaireRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\StagiaireRepositoryInterface', function($app) {
            return new StagiaireRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\StagiaireRepositoryInterface'];
    }

}