<?php

return [
    call_hook_function('url_format_behavior_submit') ?: 'url:article/admin/create:POST:200' => [
        '\Addons\LinkSubmit\Events\LinkSubmitEvent'
    ],
];
