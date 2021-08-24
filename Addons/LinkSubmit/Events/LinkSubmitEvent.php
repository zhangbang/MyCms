<?php


namespace Addons\LinkSubmit\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;

class LinkSubmitEvent
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
            'admin_name' => auth()->guard('admin')->user()->name,
            'url' => json_decode($this->response->getContent(), true)['url'],
        ];
    }
}
