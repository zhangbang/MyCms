<?php


namespace Modules\System\Service;

use App\Models\Addon as model;
use Expand\Addon\Addon;
use Expand\Addon\Repository\AddonFileRepository;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nwidart\Modules\Laravel\LaravelFileRepository;

class AddonService
{

    protected $fileRepository;
    protected $moduleRepository;

    protected $app;

    public function __construct(AddonFileRepository $fileRepository, LaravelFileRepository $moduleRepository, Container $app)
    {
        $this->fileRepository = $fileRepository;
        $this->moduleRepository = $moduleRepository;
        $this->app = $app;
    }


    /**
     * 未安装操作
     */
    public function getInstallHtml(string $ident): string
    {
        return '<button class="layui-btn layui-btn-normal layui-btn-sm" data-request="/system/addon/install/?ident=' . $ident . '" data-title="确定安装？"><i class="fa fa-plus"></i> 安装</button>';
    }

    /**
     * 已安装操作
     */
    public function getInstalledHtml(array $item): string
    {
        $html = '';

        if ($item['is_init'] === 0) {
            $html .= '<button class="layui-btn layui-btn-normal layui-btn-sm" data-request="/system/addon/init/?ident=' . $item['ident'] . '" data-title="确定启用？">启用</button>';
        }

        if ($item['is_init'] === 1) {
            $html .= '<a class="layui-btn layui-btn-normal layui-btn-sm" layuimini-content-href="' . $item['home'] . '" data-title="' . $item['name'] . '">管理</a>';
        }

        $html .= '<button class="layui-btn layui-btn-sm layui-btn-danger" data-request="/system/addon/uninstall/?ident=' . $item['ident'] . '" data-title="确定卸载？"><i class="fa fa-trash-o"></i> 卸载</button>';

        return $html;
    }

    /**
     * 本地所有插件
     */
    public function all(): array
    {
        $installed = [];

        model::all()->each(function ($item) use (&$installed) {
            $installed[$item['ident']] = $item;
        });

        return array_map(function ($item) use ($installed) {

            $item = $item->toArray();
            $item['is_init'] = $installed[$item['ident']]['is_init'] ?? 0;

            $item['operation'] = in_array($item['ident'], array_keys($installed)) ? $this->getInstalledHtml($item) : $this->getInstallHtml($item['ident']);
            $item['installed'] = in_array($item['ident'], array_keys($installed)) ?? false;

            return $item;

        }, $this->fileRepository->scan());
    }

    /**
     * 插件安装
     */
    public function install(string $ident): bool
    {
        $addon = new Addon($this->app, $ident);

        $result = (new model())->store([
            'ident' => $addon->getIdent(),
            'name' => $addon->getName(),
            'version' => $addon->getVersion(),
            'description' => $addon->getDescription(),
            'author' => $addon->getAuthor(),
        ]);

        $this->makeCache();

        if ($result) {
            Artisan::call(
                'migrate --path=./Addons/' . $ident . '/Database/Migrations'
            );
        }

        return $result;
    }

    /**
     * 插件卸载
     */
    public function uninstall(string $ident): bool
    {
        $result = (new model())->where('ident', $ident)->delete();

        $this->makeCache();

        if ($result) {
            Artisan::call(
                'migrate:rollback --path=./Addons/' . $ident . '/Database/Migrations'
            );
        }

        return $result;
    }


    /**
     * 生成插件相关缓存
     */
    public function makeCache()
    {
        $statuses = $rules = [];

        foreach ($this->all() as $item) {

            if ($item['installed']) {

                $statuses[$item['ident']] = true;

                Storage::disk("root")->put(
                    "bootstrap/cache/" . strtolower(Str::snake($item['ident'])) . "_addon.php",
                    "<?php return " . var_export(['providers' => $item['providers'], 'eager' => $item['providers'], 'deferred' => []], true) . "; ?>");

                if (file_exists($path = addon_path($item['ident'], '/Config/behavior.php'))) {
                    $array = include_once $path;
                    foreach ($array as $key => $value) {
                        $rules[$key] = array_merge($rules[$key] ?? [], $value);
                    }
                }

            } else {
                Storage::disk("root")->deleteDirectory(
                    "resources/views/addons/" . strtolower(Str::snake($item['ident']))
                );

                Storage::disk("root")->deleteDirectory(
                    "public/mycms/addons/" . strtolower(Str::snake($item['ident']))
                );

                Storage::disk("root")->delete(
                    "bootstrap/cache/" . strtolower(Str::snake($item['ident'])) . "_addon.php"
                );
            }
        }

        Storage::disk("root")->put('addons_statuses.json', json_encode($statuses));

        foreach (
            $this->moduleRepository->getByStatus(true)
            as $name => $module
        ) {
            if (file_exists(
                $path = module_path($name, 'Config/behavior.php')
            )) {
                $array = include_once $path;
                foreach ($array as $key => $value) {
                    $rules[$key] = array_merge($rules[$key] ?? [], $value);
                }
            }
        }

        Storage::disk("root")->put(
            'bootstrap/cache/behavior.php',
            "<?php return " . var_export($rules, true) . "; ?>"
        );

    }

}
