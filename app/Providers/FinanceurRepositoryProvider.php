<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\FinanceurRepository;

class FinanceurRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\FinanceurRepositoryInterface', function($app) {
            return new FinanceurRepository($app, $this->app->make('ModuleFormation\Repositories\FinanceurTypeRepositoryInterface'));
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\FinanceurRepositoryInterface'];
    }

}