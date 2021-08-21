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

    public function childTree($categories = [], $pid = 0)
    {
        $categories = $categories ?: ArticleCategory::toTree();

        if (isset($categories[$pid]) && is_array($categories[$pid])) {

            collect($categories[$pid])->each(function ($item) use (&$result, $pid, $categories) {
                $item['child'] = $this->childTree($categories, $item['id']);
                $result[] = $item;
            });

            return $result;
        }
    }

    public function childIds($categories = [], $pid = 0)
    {
        $categories = $categories ?: ArticleCategory::toTree();

        if (isset($categories[$pid]) && is_array($categories[$pid])) {

            collect($categories[$pid])->each(function ($item) use (&$result, $pid, $categories) {
                $result[] = $item['id'];
                $items = $this->childIds($categories, $item['id']);

                if ($items) {
                    $result = array_merge($result, $items);
                }
            });

            return $result;
        }
    }

}
