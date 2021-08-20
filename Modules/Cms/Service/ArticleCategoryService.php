<?php


namespace Modules\Cms\Service;


use Modules\Cms\Models\ArticleCategory;

class ArticleCategoryService
{

    public function categoryTree($categories = [], $pid = 0, $prefix = '')
    {
        $categories = $categories ?: ArticleCategory::toTree();

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
    }

}
