<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

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
        $this->addonViews();
    }

    protected function addonViews()
    {
        if (env('APP_DEBUG')) {
            collect(
                Storage::disk('root')->directories('app/Addons')
            )->each(
                function ($directory, $key) {
                    $this->loadViewsFrom(
                        base_path("{$directory}/Resources/Views/"),
                        strtolower(explode('/', $directory)[2])
                    );
                }
            );

        }
    }

    protected function moduleViews()
    {
        if (env('APP_DEBUG')) {
            collect(
                Storage::disk('root')->directories('Modules')
            )->each(
                function ($directory, $key) {
                    $this->loadViewsFrom(
                        base_path("{$directory}/Resources/views/"),
                        strtolower(explode('/', $directory)[1])
                    );
                }
            );
        }

    }

}
