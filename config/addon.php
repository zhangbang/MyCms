<?php

return [

    'paths' => [
        'addons' => base_path('Addons')
    ],

    'cache' => [
        'enabled' => false,
        'key' => 'laravel-modules',
        'lifetime' => 60,
    ],

    'activators' => [
        'file' => [
            'class' => Expand\Addon\Activator\AddonFileActivator::class,
            'statuses-file' => base_path('addons_statuses.json'),
            'cache-key' => 'activator.installed',
            'cache-lifetime' => 604800,
        ],
    ],

    'activator' => 'file'

];
