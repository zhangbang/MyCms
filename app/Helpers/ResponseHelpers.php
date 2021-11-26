<?php


namespace App\Helpers;

use Illuminate\Http\JsonResponse;

trait ResponseHelpers
{

    protected $success = '操作成功';
    protected $successCode = 200;

    protected $error = '操作失败';
    protected $errorCode = 401;

    /**
     * @param array $option
     * @return JsonResponse
     */
    public function jsonSuc(array $option = []): JsonResponse
    {
        $option['msg'] = $option['msg'] ?? $this->success;
        $option['code'] = $option['code'] ?? $this->successCode;

        return new JsonResponse($option, $option['code']);
    }

    /**
     * @param array $option
     * @return JsonResponse
     */
    public function jsonErr(array $option = []): JsonResponse
    {
        $option['msg'] = $option['msg'] ?? $this->error;
        $option['code'] = $option['code'] ?? $this->errorCode;

        return new JsonResponse($option, $option['code']);
    }

    public function result($result, $data = []): JsonResponse
    {
        return $result !== false ? $this->jsonSuc($data) : $this->jsonErr($data);
    }

    public function success($data = []): JsonResponse
    {
        return $this->result(true, $data);
    }

    public function error($data = []): JsonResponse
    {
        return $this->result(false, $data);
    }

    public function contentToArray(string $content)
    {
        return json_decode($content, true);
    }
}
