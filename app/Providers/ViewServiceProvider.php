<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\InscriptionRepository;

class ViewServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Services\ViewServiceInterface', function($app) {
            return new \ModuleFormation\Services\ViewService();
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Services\ViewServiceInterface'];
    }

}