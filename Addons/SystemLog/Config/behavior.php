<?php

return [
    'md:admin_auth:200' => [
        '\Addons\SystemLog\Events\SystemLogEvent'
    ],
    'url:system/login:POST:200' => [
        '\Addons\SystemLog\Events\SystemLogEvent'
    ],
];
