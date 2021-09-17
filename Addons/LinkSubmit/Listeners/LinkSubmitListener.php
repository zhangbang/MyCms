<?php


namespace Addons\LinkSubmit\Listeners;


use Addons\LinkSubmit\Events\LinkSubmitEvent;
use Addons\LinkSubmit\Models\LinkSubmit;
use GuzzleHttp\Client;

class LinkSubmitListener
{
    /**
     * Handle the event.
     *
     * @param LinkSubmitEvent $event
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(LinkSubmitEvent $event)
    {
        $url = $event->getUrl();

        link_submit($url);

    }
}
