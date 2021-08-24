<?php


namespace Modules\Shop\Service;


use Modules\Shop\Models\GoodsCategory;

class CategoryService
{
    public function categoryTree($categories = [], $pid = 0, $prefix = '')
    {
        $categories = $categories ?: GoodsCategory::toTree();

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


    public function childTree($categories = [], $pid = 0)
    {
        $categories = $categories ?: GoodsCategory::toTree();

        if (isset($categories[$pid]) && is_array($categories[$pid])) {

            collect($categories[$pid])->each(function ($item) use (&$result, $pid, $categories) {
                $item['child'] = $this->childTree($categories, $item['id']);
                $result[] = $item;
            });

            return $result;
        }

        return [];
    }
}
