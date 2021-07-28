<?php


namespace Modules\System\Models;


use App\Models\MyModel;

class Menu extends MyModel
{
    protected $table = "my_system_menu";

    public static function toTree()
    {
        $menus = self::orderBy('sort', 'asc')->get();
        collect($menus)->each(function ($item) use (&$result){
            $result[$item['pid']][] = $item;
        });

        return $result;
    }

}
