<?php


namespace App\Helpers;


trait ViewHelpers
{

    use ExpandHelpers;

    /*
     * 视图
     */
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view((env('APP_DEBUG') ? $this->dev() : $this->prd()) . $view, $data, $mergeData);
    }

    /*
     * 开发环境视图
     */
    protected function dev(): string
    {
        return "{$this->expandType()['name']}::";
    }

    /*
     * 生成环境视图
     */
    protected function prd(): string
    {
        return "{$this->expandType()['type']}.{$this->expandType()['name']}.";
    }


}
