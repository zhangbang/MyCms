<?php


namespace App\Helpers;


trait RequestHelpers
{

    public function request($key, $filter = '')
    {
        $value = request()->input($key);

        return $this->filter($value, $filter);
    }

    protected function filter($value, $filter)
    {
        if (!is_array($value)) {

            if ($filter) {
                return $this->{$filter}($value);
            } else {
                if (preg_match("/['\\\"]+/", $value)) {
                    return null;
                }
                $value = str_replace("&#x", "& # x", $value);    //过滤一些不安全字符
                $value = preg_replace("/eval/i", "eva l", $value);    //过滤不安全函数
                !get_magic_quotes_gpc() && $value = addslashes($value);
                return $value;
            }

        } else {
            return collect($value)->map(function ($item) use ($filter) {
                return $this->filter($item, $filter);
            })->toArray();
        }
    }


    protected function intval($value)
    {
        return intval($value);
    }

}
