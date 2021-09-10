<?php


namespace Addons\LinkSubmit\Listeners;


use Addons\LinkSubmit\Events\LinkSubmitEvent;
use Addons\LinkSubmit\Models\LinkSubmit;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Modules\System\Models\Config;
use Symfony\Component\HttpKernel\Exception\HttpException;

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

        $config = system_config([], 'link_submit');
        $api = "http://data.zz.baidu.com/urls?site={$config['link_submit_url']}&token={$config['link_submit_token']}";
        $values = $event->getValues();

        $http = new Client();
        $res = $http->request('POST', $api, [
            'headers' => [
                'Content-Type' => 'text/plain',
            ],
            'body' => $values['url']
        ]);

        $values['respond'] = $res->getBody()->getContents();

        (new LinkSubmit())->store($values);
    }
}
