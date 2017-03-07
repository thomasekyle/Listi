<?php

namespace App\Providers;

use App\Services\FileServices;
use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{
    protected $defer = false;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('FileServices', function() {
          return new FileServices();
        });
    }

    /*public function provides()
    {
      return ['App\Services\FileServices'];
    }*/
}
