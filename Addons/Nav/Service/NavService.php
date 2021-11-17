<?php


namespace Addons\Nav\Service;


use Addons\Nav\Models\Nav;
use App\Service\MyService;

class NavService extends MyService
{
    public function categoryTree($categories = [], $pid = 0, $prefix = '')
    {
        $categories = $categories ?: Nav::toTree();

        if (isset($categories[$pid]) && is_array($categories[$pid])) {

            collect($categories[$pid])->each(function ($item) use (&$result, $categories, $prefix) {
                $result[] = ['id' => $item['id'], 'name' => $prefix . $item['name']];
                $child = $this->categoryTree($categories, $item['id'], "{$prefix}__");
                if (is_array($child)) {
                    $result = array_merge($result, $child);
                }
            });

            return $result;
        }

        return [];
    }

    public function childTree($pid = 0)
    {
        return $this->tree(Nav::toTree(), $pid);

    }
}
