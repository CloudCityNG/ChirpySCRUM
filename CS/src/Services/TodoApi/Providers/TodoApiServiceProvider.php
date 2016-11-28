<?php
namespace App\Services\TodoApi\Providers;

use View;
use Lang;
use Illuminate\Support\ServiceProvider;
use App\Services\TodoApi\Providers\RouteServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;

class TodoApiServiceProvider extends ServiceProvider
{
    /**
    * Register the TodoApi service provider.
    *
    * @return void
    */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->registerResources();
    }

    /**
     * Register the TodoApi service resource namespaces.
     *
     * @return void
     */
    protected function registerResources()
    {
        // Translation must be registered ahead of adding lang namespaces
        $this->app->register(TranslationServiceProvider::class);

        Lang::addNamespace('todo_api', realpath(__DIR__.'/../resources/lang'));

        View::addNamespace('todo_api', base_path('resources/views/vendor/todo_api'));
        View::addNamespace('todo_api', realpath(__DIR__.'/../resources/views'));
    }
}
