<?php

$config = system_config([], 'url_format');

return [
    'name:cms_single:GET:200' => [
        '\Modules\Cms\Events\ViewEvent',
    ],
    'url:article/admin/create:POST:200' => [
        isset($config['url_format_convert_py']) && $config['url_format_convert_py'] > 0 ? '\Addons\UrlFormat\Events\ConvertArticleEvent' : '',
        '\Addons\LinkSubmit\Events\LinkSubmitEvent'
    ],
];
