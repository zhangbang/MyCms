<?php


namespace Addons\Nav\Models;


use App\Models\MyModel;

class Nav extends MyModel
{
    protected $table = 'my_nav';

    public function parent()
    {
        return $this->hasOne('Addons\Nav\Models\Nav', 'id', 'pid');
    }

    public static function toTree()
    {
        $category = self::orderBy('sort', 'asc')->get();

        collect($category)->each(function ($item) use (&$result){
            $result[$item['pid']][] = $item;
        });

        return $result;
    }

}
