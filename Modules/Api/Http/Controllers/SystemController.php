<?php


namespace Modules\Api\Http\Controllers;


use Illuminate\Http\JsonResponse;

class SystemController extends ApiController
{

    /**
     * 返回系统时间戳
     * @return JsonResponse
     */
    public function timestamp(): JsonResponse
    {
        return $this->success(['result' => ['timestamp' => time()]]);
    }

}
