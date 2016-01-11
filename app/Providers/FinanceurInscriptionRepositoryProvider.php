<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\FinanceurInscriptionRepository;

class FinanceurInscriptionRepositoryProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Repositories\FinanceurInscriptionRepositoryInterface', function($app) {
            return new FinanceurInscriptionRepository($app);
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Repositories\FinanceurInscriptionRepositoryInterface'];
    }

}