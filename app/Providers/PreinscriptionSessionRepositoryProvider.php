<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\PreinscriptionSessionRepository;

class PreinscriptionSessionRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\PreinscriptionSessionRepositoryInterface', function($app) {
            return new PreinscriptionSessionRepository($app, $this->app->make('ModuleFormation\Repositories\SessionRepositoryInterface'));
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\PreinscriptionSessionRepositoryInterface'];
    }

}