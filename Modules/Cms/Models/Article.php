<?php


namespace Modules\Cms\Models;


use App\Models\MyModel;

class Article extends MyModel
{

    protected $table = 'my_article';

    public function __get($key)
    {
        $meta = ArticleMeta::where([
            'article_id' => $this->getAttribute('id'),
            'meta_key' => $key
        ])->first();

        return $meta ? $meta->meta_value : parent::__get($key);
    }

    public function category()
    {
        return $this->hasOne('Modules\Cms\Models\ArticleCategory', 'id', 'category_id');
    }


}
