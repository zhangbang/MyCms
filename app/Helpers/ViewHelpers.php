<?php


namespace App\Helpers;


use Illuminate\Support\Str;

trait ViewHelpers
{

    /**
     * 模板
     */
    public function theme($view = null, $data = [], $mergeData = [])
    {
        $theme = system_config('cms_theme') ?: 'default';
        return view("template::{$theme}.views." . $view, $data, $mergeData);
    }

    /**
     * 视图
     */
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view("{$this->expandType()['name']}::" . $view, $data, $mergeData);
    }

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
