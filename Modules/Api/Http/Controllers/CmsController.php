<?php


namespace Modules\Api\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Modules\Api\Http\Requests\ArticleCommentRequest;
use Modules\Cms\Models\ArticleComment;

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
        $params = request()->input('params', '[]');

        $result = [];
        $articles = articles($page, $limit, $tag, json_decode($params, true)) ?: [];

        if ($articles) {

            $result = $this->pageFilterField($articles);
            $result['data'] = [];

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

    /**
     * 文章评论
     * @return JsonResponse
     */
    public function comments(): JsonResponse
    {
        $id = $this->request('id', 'intval');
        $root = $this->request('root', 'intval', 0);

        $comments = $this->collectFilterField(article_comments($id, $root), [
            'status', 'updated_at'
        ], true);

        return $this->success(['result' => $comments]);

    }

    /**
     * 发布文章评论
     * @return JsonResponse
     */
    public function submitComment(ArticleCommentRequest $request)
    {
        $config = system_config([], 'cms');

        if (isset($config['is_allow_comment']) && $config['is_allow_comment'] == 1) {

            $data = $request->validated();
            $content = strip_tags(paramFilter($data['content']));

            if ($article = article($data['single_id'])) {

                $rid = 0;

                if ($data['parent_id'] > 0) {

                    $obj = comment($data['parent_id'], $data['single_id']);

                    if (!$obj) {

                        return $this->error(['msg' => '非法参数.']);
                    }

                    $rid = $obj->parent_id == 0 ? $obj->id : $obj->root_id;
                }

                $comment = [
                    'single_id' => $data['single_id'],
                    'user_id' => $data['user_id'],
                    'root_id' => $rid,
                    'parent_id' => $data['parent_id'],
                    'status' => isset($config['is_auto_status']) && $config['is_auto_status'] == 1 ? 1 : 0,
                    'content' => $content,
                ];

                $object = new ArticleComment();
                $result = $object->store($comment);

                if ($result) {
                    return $this->success(['msg' => '评论成功', 'id' => $object->id]);
                }
            }

        }

        return $this->error(['msg' => "评论失败"]);

    }

}
