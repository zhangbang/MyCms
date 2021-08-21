<?php


namespace Modules\System\Models;


use App\Models\MyModel;

/**
 * Class Config
 * @package Modules\System\Models
 */
class Config extends MyModel
{
    protected $table = "my_system_config";

    protected $group = 'system';

    /**
     * 设置分组
     * @param $name
     * @return $this
     */
    public function group($name): Config
    {
        $this->group = $name;
        return $this;
    }

    /**
     * 获取配置
     * @return array
     */
    public function getConfig($key = []): array
    {
        $whereRaw = $key ? 'cfg_key in (' . join_data($key,',') . ')' : '1=1';
        $collect = $this->where('cfg_group', $this->group)->whereRaw($whereRaw)->get();

        $result = [];
        $collect->map(function ($item, $key) use (&$result) {
            $result[$item->cfg_key] = $item->cfg_val;
        });

        return $result;
    }
}
