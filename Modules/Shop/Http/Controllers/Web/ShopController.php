<?php


namespace Modules\Shop\Http\Controllers\Web;


use App\Http\Controllers\MyController;
use Modules\Shop\Models\Goods;

class ShopController extends MyController
{

    public function goods($id)
    {
        $goods = Goods::find($id);

        if (empty($goods)) {
            abort(404);
        }

        is_goods($goods);

        return $this->theme('goods', compact('goods'));
    }

    public function store()
    {
        session([
            'the_page' => 'store',
            'page_title' => '插件市场 - MyCms',
            'page_keyword' => '插件市场',
            'page_description' => '插件市场：这些插件基于MyCms开发，快速安装集成到你的系统，助你快速上线争取更多业务',
        ]);

        return $this->theme('store', ['cid' => 0]);
    }

    public function category($cid)
    {
        $category = app('goodsCategory')->find($cid);

        if (empty($category)) {
            abort(404);
        }

        is_store_category($category);

        return $this->theme('store', compact('cid', 'category'));
    }

    public function createOrder()
    {
        $goodsId = $this->request('goods_id', 'intval');
        $empower = $this->request('empower', 'intval');

        if ($goodsId && $empower) {

            $goods = Goods::find($goodsId);

            if ($goods) {

                $total = $empower == 1 ? $goods->shop_price : $goods->market_price;

                $tradeNo = create_pay_log(auth()->user()->id, $total, $goodsId, $goods->goods_name,'goods');
                $payLink = dmf_trade_create($tradeNo, $total, $goods->goods_name);

                return $this->result(true, ['pay_url' => $payLink]);
            }

        }

        return $this->result(false);
    }

}
