<?php


namespace Addons\SystemLog\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;

class SystemLogEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $request;

    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getValues(): array
    {
        return [
            'admin_id' => auth()->guard('admin')->user()->id,
            'admin_name' => auth()->guard('admin')->user()->name,
            'url' => $this->request->path(),
            'method' => $this->request->method(),
            'is_ajax' => $this->request->ajax(),
            'ip' => $this->request->getClientIp(),
            'param' => json_encode($this->request->all()),
            'useragent' => $this->request->userAgent(),
        ];
    }
}
