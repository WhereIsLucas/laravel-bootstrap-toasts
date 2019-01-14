<?php

namespace WhereIsLucas\LaravelBootstrapToasts;

use Illuminate\Support\ServiceProvider;

class ToastServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('toaster', function () {
            return $this->app->make('WhereIsLucas\LaravelBootstrapToasts\Toaster');
        });

        $this->mergeConfigFrom(
            __DIR__.'/../../config.php', 'laravel-bootstrap-toasts'
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'laravel-bootstrap-toasts');

        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/vendor/laravel-boostrap-toasts'),
            __DIR__.'/../../config.php' => config_path('laravel-bootstrap-toasts.php')
        ]);

    }

}
