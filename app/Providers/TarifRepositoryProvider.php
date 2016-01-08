<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\TarifRepository;

class TarifRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\TarifRepositoryInterface', function($app) {
            return new TarifRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\TarifRepositoryInterface'];
    }

}