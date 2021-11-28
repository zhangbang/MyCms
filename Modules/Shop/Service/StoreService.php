<?php


namespace Modules\Shop\Service;


use App\Service\MyService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
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
     * 分类详情
     * @param $id
     * @return mixed
     */
    public function categoryInfo($id)
    {
        return GoodsCategory::find($id);
    }

    /**
     * 商品列表
     * @param $page
     * @param $limit
     * @param $orderBy
     * @param $sort
     * @return LengthAwarePaginator
     */
    public function goodsList($page = 1, $limit = 10, $orderBy = 'id', $sort = 'desc'): LengthAwarePaginator
    {
        return Goods::with('category:id,name')
            ->orderBy($orderBy, $sort)
            ->paginate($limit, '*', 'page', $page);
    }


    /**
     * 搜素商品
     * @param $keyword
     * @param $page
     * @param $limit
     * @param $orderBy
     * @param $sort
     * @return LengthAwarePaginator
     */
    public function search($keyword, $page = 1, $limit = 10, $orderBy = 'id', $sort = 'desc'): LengthAwarePaginator
    {
        return Goods::with('category:id,name')
            ->where('goods_name', 'like', '%' . $keyword . '%')
            ->orderBy($orderBy, $sort)
            ->paginate($limit, '*', 'page', $page);
    }


    /**
     * 商品详情
     * @param $id
     * @return mixed
     */
    public function goods($id)
    {
        return Goods::with('category:id,name')->find($id);
    }

    /**
     * 分类商品列表
     * @param $categoryId
     * @param $page
     * @param $limit
     * @param $orderBy
     * @return LengthAwarePaginator
     */
    public function goodsForCategory($categoryId, $page = 1, $limit = 10, $orderBy = 'id', $sort = 'desc'): LengthAwarePaginator
    {
        $childIds = $this->categoryChildIds($categoryId);

        return Goods::with('category:id,name')
            ->orderBy($orderBy, $sort)
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

    /**
     * 商品增加浏览数
     * @param $id
     * @return void
     */
    public function goodsAddView($id)
    {
        Goods::where('id', $id)->update([
            'view' => DB::raw('view + 1'),
        ]);
    }
}
