<?php

namespace ModuleFormation\Providers;

use Illuminate\Support\ServiceProvider;
use ModuleFormation\Repositories\InscriptionRepository;

class SearchServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ModuleFormation\Services\SearchServiceInterface', function($app) {
            return new \ModuleFormation\Services\SearchService(
                $this->app->make('ModuleFormation\Repositories\EmployeurRepositoryInterface'),
                $this->app->make('ModuleFormation\Repositories\FinanceurRepositoryInterface'),
                $this->app->make('ModuleFormation\Repositories\FormateurRepositoryInterface'),
                $this->app->make('ModuleFormation\Repositories\ModuleRepositoryInterface'),
                $this->app->make('ModuleFormation\Repositories\StagiaireRepositoryInterface')
                );
        });
    }

    public function provides()
    {
        return ['ModuleFormation\Services\SearchServiceInterface'];
    }

}