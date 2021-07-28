<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->moduleViews();
    }

    protected function moduleViews()
    {
        collect(
            Storage::disk('root')->directories('Modules')
        )->each(
            function ($directory, $key){
                $this->loadViewsFrom(
                    base_path("{$directory}/Resources/views/"),
                    strtolower(explode('/',$directory)[1])
                );
            }
        );

    }

}
