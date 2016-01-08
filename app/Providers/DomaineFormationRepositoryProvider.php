<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\DomaineFormationRepository;

class DomaineFormationRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\DomaineFormationRepositoryInterface', function($app) {
            return new DomaineFormationRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\DomaineFormationRepositoryInterface'];
    }

}