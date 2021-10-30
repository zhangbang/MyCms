<?php


namespace Modules\Shop\Events;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewEvent
{
    protected $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->id = $request->route()->parameter('id');
    }


    public function getId(): int
    {
        return $this->id;
    }
}
