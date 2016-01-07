<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\InscriptionRepository;

class SessionServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Services\SessionServiceInterface', function($app) {
            return new \ModuleFormation\Services\SessionService();
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Services\SessionServiceInterface'];
    }

}