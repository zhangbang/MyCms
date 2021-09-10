<?php

return [

    'paths' => [
        'addons' => base_path('Addons'),

        'generator' => [
            'config' => ['path' => 'Config', 'generate' => true],
            'command' => ['path' => 'Console', 'generate' => true],
            'migration' => ['path' => 'Database/Migrations', 'generate' => true],
            'model' => ['path' => 'Models', 'generate' => true],
            'routes' => ['path' => 'Routes', 'generate' => true],
            'controller' => ['path' => 'Controllers', 'generate' => true],
            'provider' => ['path' => 'Providers', 'generate' => true],
            'static' => ['path' => 'Resources/Static', 'generate' => true],
            'views' => ['path' => 'Resources/Views', 'generate' => true],
            'event' => ['path' => 'Events', 'generate' => true],
            'listener' => ['path' => 'Listeners', 'generate' => true],
        ],
    ],

    'stubs' => [
        'enabled' => false,
        'path' => base_path() . '/Expand/Addon/Commands/stubs',
        'files' => [
            'routes/web' => 'Routes/web.php',
            'routes/api' => 'Routes/api.php',
            'scaffold/config' => 'Config/config.php',
            //'composer' => 'composer.json',
        ],
        'replacements' => [
            'routes/web' => ['LOWER_NAME', 'STUDLY_NAME'],
            'routes/api' => ['LOWER_NAME'],
            'webpack' => ['LOWER_NAME'],
            'json' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE', 'PROVIDER_NAMESPACE'],
            'views/index' => ['LOWER_NAME'],
            'views/master' => ['LOWER_NAME', 'STUDLY_NAME'],
            'scaffold/config' => ['STUDLY_NAME'],
            'composer' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'VENDOR',
                'AUTHOR_NAME',
                'AUTHOR_EMAIL',
                'MODULE_NAMESPACE',
                'PROVIDER_NAMESPACE',
            ],
        ],
        'gitkeep' => true,
    ],

    'cache' => [
        'enabled' => false,
        'key' => 'laravel-modules',
        'lifetime' => 60,
    ],

    'composer' => [
        'vendor' => 'nwidart',
        'author' => [
            'name' => 'Nicolas Widart',
            'email' => 'n.widart@gmail.com',
        ],
    ],

    'activators' => [
        'file' => [
            'class' => Expand\Addon\Activator\AddonFileActivator::class,
            'statuses-file' => base_path('addons_statuses.json'),
            'cache-key' => 'activator.installed',
            'cache-lifetime' => 604800,
        ],
    ],

    'activator' => 'file',

    'commands' => [

        AddonMakeCommand::class

    ],


];
