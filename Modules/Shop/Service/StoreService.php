<?php


namespace Modules\Shop\Service;


use App\Service\MyService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Shop\Models\Goods;
use Modules\Shop\Models\GoodsCategory;
use Modules\Shop\Models\PayLog;

class StoreService extends MyService
{

    /**
     * 分类树形结构数据
     * @return array|mixed
     */
    public function categoryTree()
    {
        $data = GoodsCategory::toTree();
        return $this->tree($data);
    }

    /**
     * 分类树形结构数据（用于下拉框）
     * @return array
     */
    public function categoryTreeForSelect(): array
    {
        $data = GoodsCategory::toTree();
        return $this->treeForSelect($data);
    }

    /**
     * 子分类ID
     * @return array|int[]
     */
    public function categoryChildIds($pid = 0): array
    {
        $data = GoodsCategory::toTree();
        return $this->childIds($data, $pid, true);
    }

    /**
     * 商品列表
     * @param $page
     * @param $limit
     * @param $orderBy
     * @return LengthAwarePaginator
     */
    public function goods($page = 1, $limit = 10, $orderBy = 'id'): LengthAwarePaginator
    {
        return Goods::with('category:id,name')
            ->orderBy($orderBy, 'desc')
            ->paginate($limit, '*', 'page', $page);
    }

    /**
     * 分类商品列表
     * @param $categoryId
     * @param $page
     * @param $limit
     * @param $orderBy
     * @return LengthAwarePaginator
     */
    public function goodsForCategory($categoryId, $page = 1, $limit = 10, $orderBy = 'id'): LengthAwarePaginator
    {
        $childIds = $this->categoryChildIds($categoryId);

        return Goods::with('category:id,name')
            ->orderBy($orderBy, 'desc')
            ->whereIn('category_id', $childIds)
            ->paginate($limit, '*', 'page', $page);
    }

    /**
     * 根据交易号获取支付记录
     * @param $tradeNo
     * @return mixed
     */
    public function payLogForTradeNo($tradeNo)
    {
        return PayLog::where('trade_no', $tradeNo)->fisrt();
    }

}
