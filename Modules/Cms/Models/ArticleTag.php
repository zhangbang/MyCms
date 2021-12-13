<?php


namespace Modules\Cms\Models;


use App\Models\MyModel;

class ArticleTag extends MyModel
{

    protected $table = 'my_article_tag';

    public function insertTags($data): array
    {

        return array_map(function ($item) {

            $tag = self::where('tag_name', $item)->first();

            if (empty($tag)) {

                $model = (new self());
                $model->store([
                    'tag_name' => $item,
                    'description' => ''
                ]);

                return $model->id;
            }

            return $tag->id;

        }, $data);

    }

}
