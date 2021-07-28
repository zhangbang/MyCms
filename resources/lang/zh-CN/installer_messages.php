<?php

return [

    /*
     *
     * Shared translations.
     *
     */
    'title' => 'MyCms安装程序',
    'next' => '下一步',
    'finish' => '安装',

    /*
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => '欢迎使用',
        'title'   => '欢迎来到MyCms安装程序',
        'message' => '欢迎来到安装向导.',
        'next'    => '检查系统环境',
    ],

    /*
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'title' => '环境要求',
        'next'    => '检查权限',
        'templateTitle' => '检查系统环境',
    ],

    /*
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'title' => '权限',
        'templateTitle' => '检查权限',
        'next' => '配置环境',
    ],

    /*
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'title' => '环境设置',
        'save' => '保存 .env',
        'success' => '.env 文件保存成功.',
        'errors' => '无法保存 .env 文件, 请手动创建它.',
        'menu' => [
            'templateTitle' => '配置环境',
            'title' => '配置环境',
            'desc' => '选择配置 <code>.env</code> 文件的方式.',
            'wizard-button' => '表单配置',
            'classic-button' => '文件编辑',
        ],
        'wizard' => [
            'templateTitle' => '表单配置 | 配置环境',
            'title' => '设置 <code>.env</code>',
            'tabs' => [
                'environment' => '基础',
                'database' => '数据库',
                'application' => '驱动',
            ],
            'form' => [
                'name_required' => 'An environment name is required.',
                'app_name_label' => '应用名称',
                'app_name_placeholder' => '请输入应用名称...',
                'app_environment_label' => '应用环境',
                'app_environment_label_local' => 'Local',
                'app_environment_label_developement' => 'Development',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => 'Production',
                'app_environment_label_other' => 'Other',
                'app_environment_placeholder_other' => 'Enter your environment...',
                'app_debug_label' => '调试模式',
                'app_debug_label_true' => 'True',
                'app_debug_label_false' => 'False',
                'app_log_level_label' => '日志等级',
                'app_log_level_label_debug' => 'debug',
                'app_log_level_label_info' => 'info',
                'app_log_level_label_notice' => 'notice',
                'app_log_level_label_warning' => 'warning',
                'app_log_level_label_error' => 'error',
                'app_log_level_label_critical' => 'critical',
                'app_log_level_label_alert' => 'alert',
                'app_log_level_label_emergency' => 'emergency',
                'app_url_label' => '应用网址',
                'app_url_placeholder' => '请输入应用网址...',
                'db_connection_failed' => 'Could not connect to the database.',
                'db_connection_label' => '数据库',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => '数据库主机',
                'db_host_placeholder' => '请输入数据库主机...',
                'db_port_label' => '数据库端口',
                'db_port_placeholder' => '请输入数据库端口...',
                'db_name_label' => '数据库名称',
                'db_name_placeholder' => '请输入数据库名称...',
                'db_username_label' => '用户名',
                'db_username_placeholder' => '请输入用户名...',
                'db_password_label' => '密码',
                'db_password_placeholder' => '请输入密码...',

                'app_tabs' => [
                    'more_info' => '更多信息',
                    'broadcasting_title' => '基本驱动',
                    'broadcasting_label' => '广播',
                    'broadcasting_placeholder' => '广播',
                    'cache_label' => '缓存',
                    'cache_placeholder' => '缓存',
                    'session_label' => 'Session',
                    'session_placeholder' => 'Session',
                    'queue_label' => '队列',
                    'queue_placeholder' => '队列',
                    'redis_label' => 'Redis',
                    'redis_host' => '主机',
                    'redis_password' => '密码',
                    'redis_port' => '端口',

                    'mail_label' => '邮件',
                    'mail_driver_label' => '邮件方式',
                    'mail_driver_placeholder' => '邮件方式',
                    'mail_host_label' => '主机',
                    'mail_host_placeholder' => '主机',
                    'mail_port_label' => '端口',
                    'mail_port_placeholder' => '端口',
                    'mail_username_label' => '用户名',
                    'mail_username_placeholder' => '用户名',
                    'mail_password_label' => '密码',
                    'mail_password_placeholder' => '密码',
                    'mail_encryption_label' => '加密',
                    'mail_encryption_placeholder' => '加密',

                    'pusher_label' => '推送',
                    'pusher_app_id_label' => 'App Id',
                    'pusher_app_id_palceholder' => 'App Id',
                    'pusher_app_key_label' => 'App Key',
                    'pusher_app_key_palceholder' => 'App Key',
                    'pusher_app_secret_label' => 'App Secret',
                    'pusher_app_secret_palceholder' => 'App Secret',
                ],
                'buttons' => [
                    'setup_database' => '连接数据库',
                    'setup_application' => '设置驱动',
                    'install' => '开始安装',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => '文件编辑 | 配置环境',
            'title' => '配置文件编辑',
            'save' => '保持 .env 文件',
            'back' => '使用表单配置',
            'install' => '保存并安装',
        ],
    ],

    /*
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => '完成',
        'finished' => '应用已成功安装.',
        'exit' => '回到首页',
    ],
];
