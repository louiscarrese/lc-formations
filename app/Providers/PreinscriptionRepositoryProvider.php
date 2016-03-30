<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\PreinscriptionRepository;

class PreinscriptionRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\PreinscriptionRepositoryInterface', function($app) {
            return new PreinscriptionRepository($app, 
                $this->app->make('ModuleFormation\Repositories\PreinscriptionSessionRepositoryInterface'));
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\PreinscriptionRepositoryInterface'];
    }

}