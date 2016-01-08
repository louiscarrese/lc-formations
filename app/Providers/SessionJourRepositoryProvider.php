<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\SessionJourRepository;

class SessionJourRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\SessionJourRepositoryInterface', function($app) {
            return new SessionJourRepository($app, $this->app->make('ModuleFormation\Repositories\FormateurRepositoryInterface'));
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\SessionJourRepositoryInterface'];
    }

}