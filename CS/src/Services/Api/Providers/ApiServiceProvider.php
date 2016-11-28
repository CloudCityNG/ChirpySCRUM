<?php
namespace App\Services\Api\Providers;

use View;
use Lang;
use Illuminate\Support\ServiceProvider;
use App\Services\Api\Providers\RouteServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
    * Register the Api service provider.
    *
    * @return void
    */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->registerResources();
    }

    /**
     * Register the Api service resource namespaces.
     *
     * @return void
     */
    protected function registerResources()
    {
        // Translation must be registered ahead of adding lang namespaces
        $this->app->register(TranslationServiceProvider::class);

        Lang::addNamespace('api', realpath(__DIR__.'/../resources/lang'));

        View::addNamespace('api', base_path('resources/views/vendor/api'));
        View::addNamespace('api', realpath(__DIR__.'/../resources/views'));
    }
}
