<?php


namespace Modules\Cms\Service;


use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleTag;
use Modules\Cms\Models\ArticleTagRel;

class ArticleService
{

    public function tags($id)
    {
        $rel = ArticleTagRel::where('article_id', $id)->select('tag_id')->get()->toArray();

        if ($tagIds = array_column($rel, 'tag_id')) {

            return ArticleTag::whereIn('id', $tagIds)
                ->get()->toArray();

        }

        return [];
    }

    public function tagsText($id): string
    {
        return join(
            array_column($this->tags($id), 'tag_name'),
            ","
        );
    }

    public function newPosts($limit = 10, $hasImg = null, $categoryId = [])
    {
        $whereRaw = $hasImg ? 'img is not null' : '1=1';

        if ($categoryId) {
            $whereRaw .= " and category_id in(" . join(",", $categoryId) . ")";
        }

        $page = request()->route()->parameter('page');


        return Article::with('category:id,name')
            ->orderBy('id', 'desc')
            ->whereRaw($whereRaw)
            ->paginate($limit, '*', 'page', $page);
    }

    public function ids()
    {
        return Article::select(['id'])->get()->toArray();
    }


}
