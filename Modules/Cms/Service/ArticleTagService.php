<?php


namespace Modules\Cms\Service;


use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleTag;
use Modules\Cms\Models\ArticleTagRel;

class ArticleTagService
{

    public function articles($id, $limit = 10)
    {
        $rel = ArticleTagRel::where('tag_id', $id)->select('article_id')->get()->toArray();

        if ($ids = array_column($rel, 'article_id')) {

            $page = request()->route()->parameter('page');

            return Article::whereIn('id', $ids)
                ->paginate($limit, '*', 'page', $page);

        }

        return [];
    }

    public function newTags($limit = 10)
    {
        return ArticleTag::orderBy('id', 'desc')->paginate($limit);
    }

}
