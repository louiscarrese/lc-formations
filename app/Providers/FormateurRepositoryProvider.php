<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\FormateurRepository;

class FormateurRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\FormateurRepositoryInterface', function($app) {
            return new FormateurRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\FormateurRepositoryInterface'];
    }

}