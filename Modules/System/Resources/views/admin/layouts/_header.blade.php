<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登陆 - MyCms</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/mycms/admin/css/public.css?v=1.0.0" media="all">
    <script>
        window.CONFIG = {
            ADMIN: "mycms",
            CONTROLLER_JS_PATH: "@if(isset($diy_js_path)){{$diy_js_path}}@else{{$js_path}}@endif",
            ACTION: "@if(isset($diy_action)){{$diy_action}}@else{{$js_action}}@endif",
            IS_SUPER_ADMIN: "1",
            VERSION: "{{$version}}",
        };
    </script>
    <script src="/mycms/plugs/layui-v2.5.6/layui.all.js?v=1.0.0" charset="utf-8"></script>
    <script src="/mycms/plugs/require-2.3.6/require.js?v=1.0.0" charset="utf-8"></script>
    <script src="/mycms/config-admin.js?v=1.0.0" charset="utf-8"></script>

</head>
