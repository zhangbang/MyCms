<?php

namespace Modules\System\Events;

use App\Helpers\ResponseHelpers;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;

/**
 * 管理员登录事件
 */
class AdminLoginEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels, ResponseHelpers;

    protected $name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->name = $this->contentToArray($response->getContent())['name'];
    }


    public function getName(): string
    {
        return $this->name;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
