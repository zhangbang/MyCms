<?php


namespace Modules\Cms\Models;


use App\Models\MyModel;

class ArticleCategory extends MyModel
{

    protected $table = 'my_article_category';

    public static function toTree()
    {
        $category = self::orderBy('id', 'asc')->get();

        collect($category)->each(function ($item) use (&$result){
            $result[$item['pid']][] = $item;
        });

        return $result;
    }

}
