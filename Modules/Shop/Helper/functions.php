<?php

use Modules\Shop\Models\PayLog;

/*
 * 获取Shop分类
 */
if (!function_exists('shop_categories')) {
    function shop_categories()
    {
        $values = app('goodsCategory')->childTree();

        return cms_hook_call('shop_hook_categories', $values);
    }
}

/*
 * 获取商品
 */
if (!function_exists('shop_goods')) {
    function shop_new_goods($cid = 0,$limit = 10)
    {
        $values = app('goods')->lists($cid, $limit);

        return cms_hook_call('shop_hook_new_goods', $values);
    }
}


/*
 * 获取商品地址
 */
if (!function_exists('shop_goods_path')) {
    function shop_goods_path($id): string
    {
        $value = route('store.goods', $id);

        return cms_hook_call('shop_hook_goods_path', $value, $id);

    }
}

if (!function_exists('is_goods')) {
    function is_goods($goods = false)
    {
        if ($goods === false) {
            return session('the_page') === 'goods';
        }

        session(['goods' => $goods]);
        session(['the_page' => 'goods']);

        return false;
    }
}

if (!function_exists('is_store')) {
    function is_store($store = false)
    {
        if ($store === false) {
            return session('the_page') === 'store';
        }

        session(['the_page' => 'store']);

        return false;
    }
}

if (!function_exists('is_store_category')) {
    function is_store_category($category = false)
    {
        if ($category === false) {
            return session('the_page') === 'store_category';
        }

        session(['store_category' => $category]);
        session(['the_page' => 'store_category']);

        return false;
    }
}

if (!function_exists('shop_categories')) {
    function shop_categories()
    {
        $values = app('goodsCategory')->childTree();

        return cms_hook_call('cms_hook_categories', $values);
    }
}

if (!function_exists('shop_path')) {
    function shop_path(): string
    {
        return route('store.index');
    }
}

if (!function_exists('shop_category_path')) {
    function shop_category_path($id): string
    {
        return route('store.index');
    }
}

if (!function_exists('create_pay_log')) {
    function create_pay_log($userId, $total, $goodsId, $payType = 'dmf')
    {
        do {
            $tradeNo = date("YmdHi") . rand(1111, 9999) . date("s");
            $log = PayLog::where('trade_no',$tradeNo)->first();
        } while ($log);

        $data = [
            'trade_no' => $tradeNo,
            'user_id' => $userId,
            'goods_id' => $goodsId,
            'total_amount' => $total,
            'pay_type' => $payType,
        ];

        $result = (new PayLog)->store($data);

        return $result ? $tradeNo : false;
    }
}
