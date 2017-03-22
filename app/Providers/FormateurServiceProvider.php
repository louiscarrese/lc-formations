<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Services\MailGeneratorService;

class FormateurServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Services\FormateurServiceInterface', function($app) {
            return new \ModuleFormation\Services\FormateurService(
		$this->app->make('ModuleFormation\Services\MailGeneratorService')
	    );
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Services\FormateurServiceInterface'];
    }

}
