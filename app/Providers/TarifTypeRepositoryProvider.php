<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\TarifTypeRepository;

class TarifTypeRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\TarifTypeRepositoryInterface', function($app) {
            return new TarifTypeRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\TarifTypeRepositoryInterface'];
    }

}