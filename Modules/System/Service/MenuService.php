<?php


namespace Modules\System\Service;


use Modules\System\Models\Menu;

class MenuService
{

    public function menuTree($menus = [], $pid = 0, $prefix = '')
    {
        $menus = $menus ?: Menu::toTree();

        if (isset($menus[$pid]) && is_array($menus[$pid])) {

            collect($menus[$pid])->each(function ($item) use (&$result, $menus, $prefix) {
                $result[] = ['id' => $item['id'], 'title' => $prefix . $item['title']];
                $child = $this->menuTree($menus, $item['id'], "{$prefix}__");
                if (is_array($child)) {
                    $result = array_merge($result, $child);
                }
            });

            return $result;
        }

    }

    public function leftMenu($menus = [], $pid = 0)
    {
        $menus = $menus ?: Menu::toTree();

        if (isset($menus[$pid]) && is_array($menus[$pid])) {

            collect($menus[$pid])->each(function ($item) use (&$result,$pid,$menus){
                $item['child'] = $this->leftMenu($menus,$item['id']);
                $result[] = $item;
            });

            return $result;
        }
    }


}
