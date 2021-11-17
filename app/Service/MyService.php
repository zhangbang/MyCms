<?php


namespace App\Service;


class MyService
{

    /**
     * 生成树形数据结构
     * @param array $data
     * @param int $pid
     * @return array|mixed
     */
    public function tree(array $data = [], int $pid = 0)
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
     * 获取树形数据ID
     * @param array $data
     * @param int $pid
     * @param boolean $self
     * @return array
     */
    public function childIds(array $data = [], int $pid = 0, bool $self = false): array
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
