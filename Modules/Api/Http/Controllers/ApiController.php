<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\MyController;

class ApiController extends MyController
{
    protected $error = '返回失败';
    protected $success = '返回成功';


    /**
     * 过滤对象需要的字段
     * @param $data
     * @param $fields
     * @param $reject
     * @return array
     */
    public function objectFilterField($data, $fields = [], $reject = false): array
    {
        $values = [];
        $array = $data->toArray();

        array_map(function ($item, $key) use ($fields, $reject, &$values) {

            if (
                ($reject === false && in_array($key, $fields)) ||
                ($reject === true && !in_array($key, $fields))
            ) {
                $values[$key] = is_null($item) ? '' : $item;
            }

        }, $array, array_keys($array));

        return $values;
    }

    /**
     * 过滤集合需要的字段
     * @param $data
     * @param array $fields
     * @param bool $reject
     * @return array
     */
    public function collectFilterField($data, $fields = [], $reject = false): array
    {
        $values = [];

        foreach ($data as $value) {

            $tmp = [];
            foreach ($value->toArray() as $key => $item) {
                if (
                    ($reject === false && in_array($key, $fields)) ||
                    ($reject === true && !in_array($key, $fields))
                ) {
                    $tmp[$key] = is_null($item) ? '' : $item;
                }
            }

            $values[] = $tmp;
        }

        return $values;
    }

    /**
     * 获取分页字段
     * @param $object
     * @return array
     */
    public function pageFilterField($object): array
    {
        return [
            'total' => $object->total(),
            'last_page' => $object->lastPage(),
            'current_page' => $object->currentPage(),
            'per_page' => $object->perPage()
        ];
    }

}
