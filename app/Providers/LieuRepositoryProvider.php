<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\LieuRepository;

class LieuRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\LieuRepositoryInterface', function($app) {
            return new LieuRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\LieuRepositoryInterface'];
    }

}