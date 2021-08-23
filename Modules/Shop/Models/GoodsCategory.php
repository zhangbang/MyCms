<?php


namespace Modules\Shop\Models;


use App\Models\MyModel;

class GoodsCategory extends MyModel
{

    protected $table = 'my_shop_goods_category';

    public static function toTree()
    {
        $category = self::orderBy('id', 'asc')->get();

        collect($category)->each(function ($item) use (&$result){
            $result[$item['pid']][] = $item;
        });

        return $result;
    }

}
