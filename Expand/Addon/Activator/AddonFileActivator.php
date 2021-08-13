<?php


namespace Expand\Addon\Activator;

use Expand\Addon\Addon;
use Illuminate\Cache\CacheManager;
use Illuminate\Config\Repository as Config;
use Illuminate\Container\Container;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Nwidart\Modules\Activators\FileActivator;

class AddonFileActivator extends FileActivator
{
    /**
     * File used to store activation statuses
     *
     * @var string
     */
    protected $statusesFile;

    /**
     * Laravel config instance
     *
     * @var Config
     */
    protected $config;

    /**
     * Laravel cache instance
     *
     * @var CacheManager
     */
    protected $cache;

    /**
     * Laravel Filesystem instance
     *
     * @var Filesystem
     */
    protected $files;


    /**
     * @var string
     */
    protected $cacheKey;

    /**
     * @var string
     */
    protected $cacheLifetime;

    /**
     * Array of modules activation statuses
     *
     * @var array
     */
    protected $modulesStatuses;


    public function __construct(Container $app)
    {

        $this->cache = $app['cache'];
        $this->files = $app['files'];
        $this->config = $app['config'];
        $this->statusesFile = $this->config('statuses-file');
        $this->cacheKey = $this->config('cache-key');
        $this->cacheLifetime = $this->config('cache-lifetime');
        $this->modulesStatuses = $this->getModulesStatuses();

    }

    /**
     * Get the path of the file where statuses are stored
     *
     * @return string
     */
    public function getStatusesFilePath(): string
    {
        return config('addon.activators.file.statuses-file');
    }

    /**
     * Reads a config parameter under the 'activators.file' key
     *
     * @param  string $key
     * @param  $default
     * @return mixed
     */
    protected function config(string $key, $default = null)
    {
        return $this->config->get('addon.activators.file.' . $key, $default);
    }

    /**
     * Get modules statuses, either from the cache or from
     * the json statuses file if the cache is disabled.
     * @return array
     * @throws FileNotFoundException
     */
    protected function getModulesStatuses(): array
    {
        if (!$this->config->get('addon.cache.enabled')) {
            return $this->readJson();
        }

        return $this->cache->remember($this->cacheKey, $this->cacheLifetime, function () {
            return $this->readJson();
        });
    }

    /**
     * Reads the json file that contains the activation statuses.
     * @return array
     * @throws FileNotFoundException
     */
    protected function readJson(): array
    {
        if (!$this->files->exists($this->statusesFile)) {
            return [];
        }

        return json_decode($this->files->get($this->statusesFile), true);
    }


    public function hasStatusForAddon(Addon $addon, bool $status): bool
    {
        if (!isset($this->modulesStatuses[$addon->getIdent()])) {
            return $status === false;
        }

        return $this->modulesStatuses[$addon->getIdent()] === $status;
    }
}
