<?php


namespace Modules\Api\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Cms\Models\Article;

class CmsController extends ApiController
{
    /**
     * 分类列表
     * @return JsonResponse
     */
    public function categories(): JsonResponse
    {
        $categories = $this->collectFilterField(categories() ?: [], [
            'updated_at'
        ], true);

        return $this->success(['result' => $categories]);
    }

    /**
     * 分类详情
     * @return JsonResponse
     */
    public function categoryInfo(): JsonResponse
    {
        $id = $this->request('id', 'intval');
        $category = app('cms')->categoryInfo($id) ?: new \stdClass();

        if ($category) {

            $category = $this->objectFilterField($category, ['updated_at'], true);
        }

        return $this->success(['result' => $category]);
    }

    /**
     * 文章列表
     * @return JsonResponse
     */
    public function articles(): JsonResponse
    {
        $page = $this->request('page', 'intval', 1);
        $limit = $this->request('limit', 'intval', 10);
        $tag = $this->request('tag', '', 'new');
        $params = request()->input('params',  '[]');

        $result = [];
        $articles = articles($page, $limit, $tag, json_decode($params, true)) ?: [];

        if ($articles) {

            $result = $this->pageFilterField($articles);

            foreach ($articles as $item) {

                $value = $this->objectFilterField($item, [
                    'content'
                ], true);

                $value['tags'] = $this->collectFilterField(article_tags($item->id), [
                    'id', 'tag_name'
                ]);

                $result['data'][] = $value;
            }
        }

        return $this->success(['result' => $result]);
    }

    /**
     * 文章详情
     * @return JsonResponse
     */
    public function articleInfo(): JsonResponse
    {
        $id = $this->request('id', 'intval');
        $meta = $this->request('meta', '', 0);

        $article = $this->objectFilterField(article($id, (bool)$meta), [], true);

        $article['tags'] = $this->collectFilterField(article_tags($id), [
            'id', 'tag_name'
        ]);

        app('cms')->articleAddView($id);

        return $this->success(['result' => $article]);
    }

}
