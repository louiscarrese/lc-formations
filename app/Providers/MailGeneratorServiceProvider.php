<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;

class MailGeneratorServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Services\MailGeneratorServiceInterface', function($app) {
            return new \ModuleFormation\Services\MailGeneratorService();
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Services\MailGeneratorServiceInterface'];
    }

}