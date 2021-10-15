<?php


namespace App\Helpers;

use Illuminate\Support\Str;

trait ExpandHelpers
{
    /**
     * 获取拓展类型及名称
     */
    public function expandType(): array
    {
        $namespace = (new \ReflectionClass($this))->getNamespaceName();
        list($type, $name) = explode("\\", $namespace);

        $name = $type == 'Template' ? 'Cms' : $name;

        return [
            'type' => strtolower(Str::snake($type)),
            'name' => strtolower(Str::snake($name))
        ];
    }
}
