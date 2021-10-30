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
