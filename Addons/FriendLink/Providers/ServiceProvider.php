<?php


namespace Addons\FriendLink\Providers;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @var string $addonName
     */
    protected $addonName = 'FriendLink';

    /**
     * @var string $moduleNameLower
     */
    protected $addonNameLower = 'friend_link';

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
