<?php


namespace Modules\Shop\Service;


use Modules\Shop\Models\Goods;

class GoodsService
{

    public function lists($cid = 0, $limit = 10)
    {
        $whereRaw = '1=1';

        if ($cid) {

            $categoryId = app('goodsCategory')->childIds([], $cid, true);
            $whereRaw .= " and category_id in(" . join(",", $categoryId) . ")";
        }

        $page = request()->route()->parameter('page');

        return Goods::with('category:id,name')
            ->orderBy('id', 'desc')
            ->whereRaw($whereRaw)
            ->paginate($limit, '*', 'page', $page);
    }

}
