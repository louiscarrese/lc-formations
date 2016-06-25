<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Services\DireccteService;

class DireccteServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Services\DireccteServiceInterface', function($app) {
            return new DireccteService(
                $this->app->make('ModuleFormation\Repositories\SessionJourRepositoryInterface')
            );
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Services\DireccteServiceInterface'];
    }

}