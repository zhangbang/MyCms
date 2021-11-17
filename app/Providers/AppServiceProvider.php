<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
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

        $this->registerConfig();
        $this->templateViews();

        if (env('IS_HTTPS')) {
            URL::forceScheme('https');
        }
    }

    protected function templateViews()
    {
        $this->loadViewsFrom(
            base_path("Template"),
            'template'
        );
    }

    protected function registerConfig()
    {

        if (file_exists(base_path('bootstrap/cache/pipeline.php'))) {
            $this->mergeConfigFrom(
                base_path('bootstrap/cache/pipeline.php'), 'pipeline'
            );
        }

    }

}
