<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\ExtractionRepository;

class ExtractionRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\ExtractionRepositoryInterface', function($app) {
            return new ExtractionRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\ExtractionRepositoryInterface'];
    }

}
