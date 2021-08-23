<?php


namespace Modules\Shop\Models;


use App\Models\MyModel;

class Goods extends MyModel
{

    protected $table = 'my_shop_goods';

    public function category()
    {
        return $this->hasOne('Modules\Shop\Models\GoodsCategory', 'id', 'category_id');
    }

}
