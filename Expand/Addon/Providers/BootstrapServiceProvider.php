<?php


namespace Expand\Addon\Providers;


use Expand\Addon\Repository\AddonRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Booting the package.
     */
    public function boot(): void
    {
        $this->app[AddonRepositoryInterface::class]->boot();
    }

    /**
     * Register the provider.
     */
    public function register(): void
    {
        $this->app[AddonRepositoryInterface::class]->register();
    }
}
