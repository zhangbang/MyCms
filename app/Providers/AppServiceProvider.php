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
        $this->loadThemeFunctions();

        if (env('IS_HTTPS')) {
            URL::forceScheme('https');
        }
    }

    /**
     * 加载模板
     *
     * @return void
     */
    protected function templateViews()
    {
        $this->loadViewsFrom(
            base_path("Template"),
            'template'
        );
    }

    /**
     * 加载管道操作配置
     *
     * @return void
     */
    protected function registerConfig()
    {

        if (file_exists(base_path('bootstrap/cache/pipeline.php'))) {
            $this->mergeConfigFrom(
                base_path('bootstrap/cache/pipeline.php'), 'pipeline'
            );
        }

    }

    /**
     * 加载模板自定义函数
     *
     * @return void
     */
    protected function loadThemeFunctions()
    {
        $theme = system_config('cms_theme') ?? 'default';
        $functions = base_path('Template/' . $theme . '/helpers/functions.php');
        if (file_exists($functions)) {
            include_once $functions;
        }
    }

}
