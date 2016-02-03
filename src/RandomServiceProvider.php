<?php

namespace Webcraft\Random;

use Illuminate\Support\ServiceProvider;

class RandomServiceProvider extends ServiceProvider
{
    protected $defer = true;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laravel-random.php' => config_path('laravel-random.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/laravel-random.php', 'laravel-random');
        
        $this->app->singleton('random', function ($app) {
            $factory = new \RandomLib\Factory;
            
            $strength = $app['config']->get('laravel-random.strength');
            
            if ($strength === 'high') {
                return $factory->getHighStrengthGenerator();
            }
            
            if ($strength === 'medium') {
                return $factory->getMediumStrengthGenerator();
            }
            
            return $factory->getLowStrengthGenerator();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['random'];
    }
}
