<?php

namespace stekel\LaravelRelease;

use Illuminate\Support\ServiceProvider;
use stekel\LaravelRelease\AssessmentManager;
use stekel\LaravelRelease\Laravel\Console\LaravelRelease as LaravelReleaseCommand;

class LaravelReleaseServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    
    /**
     * Release scripts
     *
     * @var array
     */
    protected $scripts = [
        Scripts\Yarn::class,
    ];
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            
            $this->commands([
                LaravelReleaseCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('release', function($app) {
            
            return new ReleaseManager($this->scripts);
        });
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'release',
            'runner',
        ];
    }
}
