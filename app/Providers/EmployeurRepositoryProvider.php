<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\EmployeurRepository;

class EmployeurRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\EmployeurRepositoryInterface', function($app) {
            return new EmployeurRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\EmployeurRepositoryInterface'];
    }

}