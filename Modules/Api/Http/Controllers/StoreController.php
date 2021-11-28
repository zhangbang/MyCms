<?php


namespace Modules\Api\Http\Controllers;


use Illuminate\Http\JsonResponse;

class StoreController extends ApiController
{
    /**
     * 分类列表
     * @return JsonResponse
     */
    public function categories(): JsonResponse
    {
        $categories = $this->collectFilterField(store_category() ?: [], [
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
        $category = app('store')->categoryInfo($id) ?: new \stdClass();

        if ($category) {

            $category = $this->objectFilterField($category, ['updated_at'], true);
        }

        return $this->success(['result' => $category]);
    }

    /**
     * 商品列表
     * @return JsonResponse
     */
    public function goodsList(): JsonResponse
    {
        $page = $this->request('page', 'intval', 1);
        $limit = $this->request('limit', 'intval', 10);
        $tag = $this->request('tag', '', 'new');
        $params = request()->input('params', '[]');

        $result = [];
        $goods = goods($page, $limit, $tag, json_decode($params, true)) ?: [];

        if ($goods) {

            $result = $this->pageFilterField($goods);
            $result['data'] = [];

            foreach ($goods as $item) {

                $result['data'][] = $this->objectFilterField($item, [
                    'content', 'updated_at', 'created_at'
                ], true);
            }
        }

        return $this->success(['result' => $result]);
    }

    /**
     * 商品详情
     * @return JsonResponse
     */
    public function goodsInfo(): JsonResponse
    {
        $id = $this->request('id', 'intval');

        $goods = app('store')->goods($id);

        $goods = $this->objectFilterField($goods, [], true);

        app('store')->goodsAddView($id);

        return $this->success(['result' => $goods]);
    }

}
