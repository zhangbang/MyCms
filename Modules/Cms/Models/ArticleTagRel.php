<?php


namespace Modules\Cms\Models;


use App\Models\MyModel;
use Illuminate\Support\Facades\DB;

class ArticleTagRel extends MyModel
{

    protected $table = 'my_article_tag_rel';

    public function insertRel(int $articleId, array $tagId)
    {

        self::where('article_id', $articleId)->delete();

        collect($tagId)->each(function ($item) use ($articleId) {

            DB::table($this->table)->insertGetId([
                'article_id' => $articleId,
                'tag_id' => $item,
            ]);

        });

    }

}
