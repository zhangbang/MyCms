<?php


namespace Expand\Addon\Providers;


use Expand\Addon\Activator\AddonActivatorInterface;
use Expand\Addon\Repository\AddonFileRepository;
use Expand\Addon\Repository\AddonRepositoryInterface;
use Illuminate\Support\Str;
use Nwidart\Modules\Exceptions\InvalidActivatorClass;
use Nwidart\Modules\ModulesServiceProvider;

class AddonServiceProvider extends ModulesServiceProvider
{

    /**
     * Booting the package.
     */
    public function boot()
    {
        $this->registerNamespaces();
        $this->registerAddons();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerServices();
        $this->registerProviders();
        $this->registerBehavior();
        $this->registerAddonProviders();
        $this->registerRole();
    }

    /**
     * 注册行为
     */
    protected function registerRole()
    {
        $path = Str::replaceLast('config.php', 'role.php', $this->app->getCachedConfigPath());

        if (file_exists($path)) {
            $this->mergeConfigFrom(
                $path, 'role_ext'
            );
        }
    }

    /**
     * 注册行为
     */
    protected function registerBehavior()
    {
        $path = Str::replaceLast('config.php', 'behavior.php', $this->app->getCachedConfigPath());

        if (file_exists($path)) {
            $this->mergeConfigFrom(
                $path, 'behavior'
            );
        }
    }

    /**
     * 注册插件
     */
    protected function registerAddons()
    {
        $this->app->register(BootstrapServiceProvider::class);
    }

    /**
     * 注册服务
     */
    protected function registerServices()
    {
        $this->app->singleton(AddonRepositoryInterface::class, function ($app) {
            $path = $app['config']->get('addon.paths.addons');

            return new AddonFileRepository($app, $path);
        });

        $this->app->singleton(AddonActivatorInterface::class, function ($app) {
            $activator = $app['config']->get('addon.activator');
            $class = $app['config']->get('addon.activators.' . $activator)['class'];

            if ($class === null) {
                throw InvalidActivatorClass::missingConfig();
            }

            return new $class($app);
        });

        $this->app->alias(AddonRepositoryInterface::class, 'addons');
    }

    /**
     * Register Addon providers.
     */
    protected function registerAddonProviders()
    {
        $this->app->register(AddonGeneratorProvider::class);
    }
}
