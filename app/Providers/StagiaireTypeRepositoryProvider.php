<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\StagiaireTypeRepository;

class StagiaireTypeRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\StagiaireTypeRepositoryInterface', function($app) {
            return new StagiaireTypeRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\StagiaireTypeRepositoryInterface'];
    }

}