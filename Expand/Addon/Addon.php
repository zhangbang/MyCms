<?php


namespace Expand\Addon;


use Expand\Addon\Activator\AddonActivatorInterface;
use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Nwidart\Modules\Laravel\Module;

class Addon extends Module
{

    /**
     * @var AddonActivatorInterface
     */
    protected $activator;

    public function __construct(Container $app, string $ident)
    {
        $this->activator = $app[AddonActivatorInterface::class];

        parent::__construct($app, $ident,'');
    }

    public function getName(): string
    {
        return $this->getInfo('name');
    }

    public function getIdent(): string
    {
        return $this->getInfo('ident');
    }

    public function getDescription(): string
    {
        return $this->getInfo('description');
    }

    public function getVersion(): string
    {
        return $this->getInfo('version');
    }

    public function getAuthor(): string
    {
        return $this->getInfo('author');
    }

    public function getProviders(): array
    {
        return $this->getInfo('providers');
    }

    public function getHome(): string
    {
        return $this->getInfo('home');
    }

    public function getInfo(string $key, $default = null)
    {
        return $this->json('addon.json')->get($key, $default);
    }


    public function getPath(): string
    {
        return config('addon.paths.addons', app_path('Addons')). "/" . $this->getStudlyName();
    }

    /**
     * {@inheritdoc}
     */
    public function getCachedServicesPath(): string
    {
        // This checks if we are running on a Laravel Vapor managed instance
        // and sets the path to a writable one (services path is not on a writable storage in Vapor).
        if (!is_null(env('VAPOR_MAINTENANCE_MODE', null))) {
            return Str::replaceLast('config.php', $this->getSnakeName() . '_addon.php', $this->app->getCachedConfigPath());
        }

        return Str::replaceLast('services.php', $this->getSnakeName() . '_addon.php', $this->app->getCachedServicesPath());
    }

    /**
     * Determine whether the given status same with the current module status.
     *
     * @param bool $status
     *
     * @return bool
     */
    public function isStatus(bool $status) : bool
    {
        return $this->activator->hasStatusForAddon($this, $status);
    }

    /**
     * Determine whether the current module activated.
     *
     * @return bool
     */
    public function isEnabled() : bool
    {
        return $this->activator->hasStatusForAddon($this, true);
    }

    /**
     * Get a specific data from json file by given the key.
     *
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $this->getInfo($key, $default);
    }

    /**
     * 插件数据转数组
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'ident' => $this->getIdent(),
            'description' => $this->getDescription(),
            'version' => $this->getVersion(),
            'author' => $this->getAuthor(),
            'providers' => $this->getProviders(),
            'home' => $this->getHome(),
        ];
    }

}
