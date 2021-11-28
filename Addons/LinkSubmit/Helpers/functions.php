<?php

use Addons\LinkSubmit\Models\LinkSubmit;
use GuzzleHttp\Client;

if (!function_exists('link_submit')) {
    function link_submit($url)
    {
        $config = system_config([], 'link_submit');
        $api = "http://data.zz.baidu.com/urls?site={$config['link_submit_url']}&token={$config['link_submit_token']}";

        $http = new Client();
        $res = $http->request('POST', $api, [
            'headers' => [
                'Content-Type' => 'text/plain',
            ],
            'body' => $url
        ]);

        $values = [
            'respond' => $res->getBody()->getContents()
        ];

        $list = explode("\n", $url);
        foreach ($list as $item) {
            $values['admin_name'] = auth()->guard('admin')->user()->name ?? 'system';
            $values['url'] = $item;

            (new LinkSubmit())->store($values);
        }
    }
}
