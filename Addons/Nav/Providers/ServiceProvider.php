<?php


namespace Addons\Nav\Providers;


use Addons\Nav\Service\NavService;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @var string $addonName
     */
    protected $addonName = 'Nav';

    /**
     * @var string $moduleNameLower
     */
    protected $addonNameLower = 'nav';

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

        $this->app->bind('nav', function ($app) {
            return new NavService();
        });
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
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
        $this->loadViewsFrom(addon_path($this->addonName, '/Resources/Views'), $this->addonNameLower);
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
