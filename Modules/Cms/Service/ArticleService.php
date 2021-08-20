<?php


namespace Modules\Cms\Service;


use Modules\Cms\Models\ArticleTag;
use Modules\Cms\Models\ArticleTagRel;

class ArticleService
{

    public function tags($id)
    {
        $rel = ArticleTagRel::where('article_id', $id)->get()->toArray();

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

}
