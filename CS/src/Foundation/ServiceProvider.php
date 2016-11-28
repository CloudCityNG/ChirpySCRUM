<?php
namespace App\Foundation;

use App\Services\Api\Providers\ApiServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use App\Services\TodoApi\Providers\TodoApiServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        // Register the service providers of your Services here.
        // $this->app->register('full namespace here')
        $this->app->register(ApiServiceProvider::class);
        $this->app->register(TodoApiServiceProvider::class);
    }
}
