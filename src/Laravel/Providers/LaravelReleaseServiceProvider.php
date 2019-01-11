<?php

namespace stekel\LaravelRelease;

use Illuminate\Support\ServiceProvider;
use stekel\LaravelRelease\ReleaseManager;
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
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Config/release.php' => config_path('release.php'),
        ]);
        
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
        $this->mergeConfigFrom(
            __DIR__.'/../Config/release.php', 'release'
        );
        
        $this->app->singleton('release', function($app) {
            
            return new ReleaseManager(config('release.scripts'));
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
        ];
    }
}
