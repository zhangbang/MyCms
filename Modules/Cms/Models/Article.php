<?php


namespace Modules\Cms\Models;


use App\Models\MyModel;

class Article extends MyModel
{

    protected $table = 'my_article';

    public function category()
    {
        return $this->hasOne('Modules\Cms\Models\ArticleCategory', 'id', 'category_id');
    }

}
