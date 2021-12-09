<?php


namespace Modules\System\Service;


use App\Service\MyService;
use Modules\System\Models\Menu;
use Modules\System\Models\Region;

class SystemService extends MyService
{

    /**
     * 获取地区列表
     * @param $pid
     * @return mixed
     */
    public function regions($pid = 0)
    {
        return Region::where('pid', $pid)->get();
    }

    /**
     * 插件添加到菜单
     * @param $name
     * @param $homePath
     * @return bool
     */
    public function addonToMenu($name, $homePath): bool
    {

        $addonMenu = Menu::where('title', '系统插件')->first();

        if (!$addonMenu) {

            $addonMenu = new Menu();

            $addonMenu->store([
                'pid' => 0,
                'title' => '系统插件',
                'url' => '',
                'icon' => 'fa fa-bars',
                'target' => '_self',
                'sort' => '0',
            ]);
        }

        $data = [
            'pid' => $addonMenu->id,
            'title' => $name,
            'url' => $homePath,
            'icon' => 'fa fa-bars',
            'target' => '_self',
            'sort' => '0',
        ];

        return (new Menu())->store($data);
    }

    /**
     * 删除插件菜单
     * @param $homePath
     * @return mixed
     */
    public function addonRemoveForMenu($homePath)
    {
        return Menu::where([
            ['url', '=', $homePath],
        ])->delete();
    }
}
