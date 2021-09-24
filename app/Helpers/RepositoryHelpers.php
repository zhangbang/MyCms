<?php


namespace App\Helpers;


use Illuminate\Support\Facades\DB;

trait RepositoryHelpers
{
    /**
     * @param array $option
     * @param string $condition
     * @return int|bool
     */
    public function batchUpdate(array $option, string $condition): int
    {

        $updateSql = "UPDATE " . $this->table . " SET ";

        collect($option)->each(
            function ($data, $column) use (&$updateSql) {
                $updateSql .= "{$column} = case ";
                collect($data)->each(function ($items, $field) use (&$updateSql) {
                    $updateSql .= "{$field} ";
                    collect($items)->each(function ($val, $key) use (&$updateSql) {
                        $updateSql .= " WHEN '{$key}' THEN '{$val}' ";
                    });
                });
                $updateSql .= 'end,';
            }
        );

        $updateSql = rtrim($updateSql, ',') . " where {$condition} and cfg_key in(" . join_data(array_keys($option['cfg_val']['cfg_key']),',') . ")";
        return DB::update($updateSql);
    }

    public function serializeDate(\DateTimeInterface $dateTime): string
    {
        return $dateTime->format('Y-m-d H:i:s');
    }


    public function store($data): bool
    {
        return $this->each($data)->save();
    }

    public function up($data): bool
    {
        return $this->find($data[$this->getKeyName()])->each($data)->save();
    }

    protected function each($data)
    {
        collect($data)->each(
            function ($item, $key) {
                if ($this->getKeyName() !== $key) {
                    $this->{$key} = $item;
                }
            }
        );

        return $this;
    }

}
