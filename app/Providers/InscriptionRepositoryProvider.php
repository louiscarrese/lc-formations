<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\InscriptionRepository;

class InscriptionRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\InscriptionRepositoryInterface', function($app) {
            return new InscriptionRepository($app, 
                $this->app->make('ModuleFormation\Repositories\SessionRepositoryInterface'),
                $this->app->make('ModuleFormation\Repositories\TarifRepositoryInterface'));
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\InscriptionRepositoryInterface'];
    }

}