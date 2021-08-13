<?php


namespace Expand\Addon\Repository;


use Expand\Addon\Addon;
use Illuminate\Container\Container;
use Nwidart\Modules\Json;
use Nwidart\Modules\Laravel\LaravelFileRepository;
use Nwidart\Modules\Module;

class AddonFileRepository extends LaravelFileRepository
{

    public function __construct(Container $app, $path = null)
    {
        parent::__construct($app, $path);
    }

    /**
     * @inheritDoc
     */
    public function config(string $key, $default = null)
    {
        return config('addon.' . $key, $default);
    }

    /**
     * 获取地址
     */
    public function getPath(): string
    {
        return $this->config('paths.addons', app_path('Addons'));
    }

    /**
     * 创建插件实例
     */
    protected function createModule(...$args)
    {
        return new Addon(...$args);
    }

    /**
     * 扫描插件
     */
    public function scan(): array
    {
        $paths = $this->getScanPaths();

        $modules = [];

        foreach ($paths as $key => $path) {
            $manifests = $this->getFiles()->glob("{$path}/addon.json");

            is_array($manifests) || $manifests = [];

            foreach ($manifests as $manifest) {
                $addon = Json::make($manifest)->getAttributes();
                $modules[$addon['ident']] = $this->createModule($this->app, $addon['ident'], dirname($manifest));
            }
        }

        return $modules;
    }
}
