<?php

namespace Oleander\Decrypt\Src;

use Illuminate\Support\ServiceProvider;
use Oleander\Decrypt\DecryptService;
class DecryptServiceProvider extends ServiceProvider
{
    protected $DecryptService;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->DecryptService = new DecryptService;

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('decrypt', function(){
            return $this->DecryptService;
        });
    }
}
