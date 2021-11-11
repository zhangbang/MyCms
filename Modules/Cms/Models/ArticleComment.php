<?php


namespace Modules\Cms\Models;


use App\Models\MyModel;

class ArticleComment extends MyModel
{
    protected $table = 'my_article_comment';

    public function user()
    {
        return $this->hasOne('Modules\User\Models\User', 'id', 'user_id');
    }

    public function article()
    {
        return $this->hasOne('Modules\Cms\Models\Article', 'id', 'single_id');
    }
}
