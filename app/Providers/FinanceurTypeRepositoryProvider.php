<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\FinanceurTypeRepository;

class FinanceurTypeRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\FinanceurTypeRepositoryInterface', function($app) {
            return new FinanceurTypeRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\FinanceurTypeRepositoryInterface'];
    }

}