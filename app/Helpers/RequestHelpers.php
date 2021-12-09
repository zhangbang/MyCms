<?php


namespace App\Helpers;


trait RequestHelpers
{

    /**
     * 处理请求参数
     * @param $key
     * @param $filter
     * @param $default
     * @return array|mixed|string|string[]|null
     */
    public function request($key, $filter = '', $default = '')
    {
        $value = $this->filter(request()->input($key), $filter);
        return $value === false ? $default : $value;
    }

    /**
     * 过滤参数值
     * @param $value
     * @param $filter
     * @return array|false|string|string[]|null
     */
    protected function filter($value, $filter)
    {
        if (!is_array($value)) {

            if ($filter) {
                return $this->{$filter}($value);
            } else {
                return paramFilter($value);
            }

        } else {
            return collect($value)->map(function ($item) use ($filter) {
                return $this->filter($item, $filter);
            })->toArray();
        }
    }


    protected function intval($value): int
    {
        return intval($value);
    }

    protected function floatval($value): float
    {
        return floatval($value);
    }

    protected function mobile($value)
    {
        return preg_match("/^1\d{10}$/", $value) ? $value : false;
    }

}
