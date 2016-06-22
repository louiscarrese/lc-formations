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
            return new SessionRepository($app, 
                $this->app->make('ModuleFormation\Services\SessionServiceInterface'),
                $this->app->make('ModuleFormation\Services\MailGeneratorServiceInterface')
                );
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\SessionRepositoryInterface'];
    }

}