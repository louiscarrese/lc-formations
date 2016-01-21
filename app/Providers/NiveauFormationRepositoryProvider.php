<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\NiveauFormationRepository;

class NiveauFormationRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\NiveauFormationRepositoryInterface', function($app) {
            return new NiveauFormationRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\NiveauFormationRepositoryInterface'];
    }

}