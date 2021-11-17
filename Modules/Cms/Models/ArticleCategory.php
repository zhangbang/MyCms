<?php


namespace Modules\Cms\Models;


use App\Models\MyModel;

class ArticleCategory extends MyModel
{

    protected $table = 'my_article_category';

    public function __get($key)
    {
        $meta = ArticleCategoryMeta::where([
            'category_id' => $this->getAttribute('id'),
            'meta_key' => $key
        ])->first();

        return $meta ? $meta->meta_value : parent::__get($key);
    }

    public static function toTree()
    {
        $category = self::orderBy('id', 'asc')->get();

        collect($category)->each(function ($item) use (&$result){
            $result[$item['pid']][] = $item;
        });

        return $result;
    }

}
