<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\SessionRepository;

class SessionRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\SessionRepositoryInterface', function($app) {
            return new SessionRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\SessionRepositoryInterface'];
    }

}