<?php


namespace Modules\Cms\Service;


use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleTagRel;

class ArticleTagService
{

    public function articles($id, $limit = 10)
    {
        $rel = ArticleTagRel::where('tag_id', $id)->select('article_id')->get()->toArray();

        if ($ids = array_column($rel, 'article_id')) {

            return Article::whereIn('id', $ids)
                ->paginate($limit);

        }

        return [];
    }

}
