<!DOCTYPE html>
<html lang="zh">
<head>
    <title>{{cms_the_title()}}</title>
    <meta http-equiv='content-language' content='en-gb'>
    <!-- ======== META TAGS ======== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="description" content="{{cms_the_description()}}">
    <meta name="keywords" content="{{cms_the_keyword()}}">
    <meta name="applicable-device"content="PC,mobile">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ======== / META TAGS ======== -->
    <!-- ======== STYLESHEETS ======== -->
    <link rel="stylesheet" href="/mycms/cms/theme/default/assets/css/reset.css" type="text/css">
    <link rel="stylesheet" href="/mycms/cms/theme/default/assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/mycms/cms/theme/default/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/mycms/cms/theme/default/assets/css/lightbox.min.css" type="text/css">
    <link rel="stylesheet" href="/mycms/cms/theme/default/assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="/mycms/cms/theme/default/assets/css/style.css" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Alike" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <noscript>

    </noscript>
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="//house.studio-themes.com/assets/css/ie.css">
    <![endif]-->
    <!-- ======== / STYLESHEETS ======== -->
    <!-- ======== STANDARD SCRIPTS ======== -->
    <script src="/mycms/cms/theme/default/assets/js/jquery.js"></script>
    <!--[if lt IE 9]>
    <script src="/mycms/cms/theme/default/assets/js/html5shiv.js"></script>
    <script src="/mycms/cms/theme/default/assets/js/respond.js"></script>
    <![endif]-->
    <!-- ======== / STANDARD SCRIPTS ======== -->
    @if(($headerJs = system_config('site_header_js')) !== null)
        {!! $headerJs !!}
    @endif

    <style>
        #header-section h1 {
            margin-bottom: 0;
            font-size: 30px;
        }
        .post>header h1 {
            margin: 40px 0 10px!important;
            font-size: 26px;
        }
    </style>
</head>
<body>

{{--<div id="preloader"></div>--}}