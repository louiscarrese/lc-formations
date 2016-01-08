<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\FormateurTypeRepository;

class FormateurTypeRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\FormateurTypeRepositoryInterface', function($app) {
            return new FormateurTypeRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\FormateurTypeRepositoryInterface'];
    }

}