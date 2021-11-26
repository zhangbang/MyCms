<?php


namespace App\Service;


class MyService
{

    /**
     * 生成树形数据结构
     * @param $data
     * @param $pid
     * @return array
     */
    public function tree($data = [], $pid = 0): array
    {
        $result = [];

        if (isset($data[$pid]) && is_array($data[$pid])) {

            collect($data[$pid])->each(function ($item) use (&$result, $pid, $data) {
                $item['child'] = $this->tree($data, $item['id']);
                $result[] = $item;
            });

        }

        return $result;
    }

    /**
     * 生成树形数据结构(用于下拉框)
     * @param array $data
     * @param int $pid
     * @param string $prefix
     * @return array
     */
    public function treeForSelect($data = [], $pid = 0, $prefix = ''): array
    {
        $result = [];

        if (isset($data[$pid]) && is_array($data[$pid])) {

            collect($data[$pid])->each(function ($item) use (&$result, $pid, $data, $prefix) {

                $result[] = ['id' => $item['id'], 'name' => $prefix . $item['name']];
                $child = $this->treeForSelect($data, $item['id'], $prefix . "__");

                if (is_array($child)) {

                    $result = array_merge($result, $child);
                }
            });

        }

        return $result;
    }

    /**
     * 获取树形数据ID
     * @param $data
     * @param $pid
     * @param $self
     * @return array
     */
    public function childIds($data = [], $pid = 0, $self = false): array
    {
        $result = $self ? [$pid] : [];

        if (isset($data[$pid]) && is_array($data[$pid])) {

            collect($data[$pid])->each(function ($item) use (&$result, $pid, $data) {

                $result[] = $item['id'];
                $items = $this->childIds($data, $item['id']);

                if ($items) {
                    $result = array_merge($result, $items);
                }
            });

        }

        return $result;
    }
}
