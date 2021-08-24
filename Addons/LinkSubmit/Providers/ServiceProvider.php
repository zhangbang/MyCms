<?php


namespace Addons\LinkSubmit\Providers;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @var string $addonName
     */
    protected $addonName = 'LinkSubmit';

    /**
     * @var string $moduleNameLower
     */
    protected $addonNameLower = 'link_submit';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerViews();
        $this->registerStatic();
        $this->loadMigrationsFrom(addon_path($this->addonName, '/Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            addon_path($this->addonName, '/Config/config.php') => config_path($this->addonNameLower . '.php'),
        ], 'addon_'.$this->addonNameLower);
        $this->mergeConfigFrom(
            addon_path($this->addonName, '/Config/config.php'), $this->addonNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/addons/' . $this->addonNameLower);

        $sourcePath = addon_path($this->addonName, '/Resources/Views');

        $this->publishes([
            $sourcePath => $viewPath
        ], 'addon_'.$this->addonNameLower);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->addonNameLower);
    }

    /**
     * Register static.
     *
     * @return void
     */
    protected function registerStatic()
    {
        $this->publishes([
            addon_path($this->addonName, '/Resources/Static') => public_path('mycms/addons/' . $this->addonNameLower),
        ], 'addon_'.$this->addonNameLower);
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/addons/' . $this->addonNameLower)) {
                $paths[] = $path . '/addons/' . $this->addonNameLower;
            }
        }
        return $paths;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [];
    }
}
