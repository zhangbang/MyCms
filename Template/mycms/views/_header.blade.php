<!doctype html>
<html class="no-js" lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{page_title()}}</title>
    <meta name="keywords" content="{{page_keyword()}}">
    <meta name="description" content="{{page_description()}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- ========== Start Stylesheet ========== -->
    <link href="/mycms/cms/theme/mycms/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/mycms/cms/theme/mycms/assets/css/fontawesome.min.css" rel="stylesheet" />
    <link href="/mycms/cms/theme/mycms/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="/mycms/cms/theme/mycms/assets/css/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="/mycms/cms/theme/mycms/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/mycms/cms/theme/mycms/assets/css/animate.css" rel="stylesheet" />
    <link href="/mycms/cms/theme/mycms/assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="/mycms/cms/theme/mycms/assets/css/themify-icons.css" rel="stylesheet" />
    <link href="/mycms/cms/theme/mycms/assets/css/style.css" rel="stylesheet">
    <link href="/mycms/cms/theme/mycms/assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    @if(($headerJs = system_config('site_header_js')) !== null)
        {!! $headerJs !!}
    @endif

    @if(is_home())
        <style>
            .navbar-brand h1{
                text-indent: -9999px;
                height: 0;
                margin: 0;
            }
        </style>
    @endif
</head>

<body id="bdy" class="no-scroll-y">

<!-- Start header
============================================= -->
<header class="header bg-2">
    <div class="main-navigation">
        <nav id="navbar_top" class="navbar navbar-expand-lg">
            <div class="container g-0">
                <a class="navbar-brand" href="{{home_path()}}">
                    @if(is_home())
                    <h1>{{system_config('site_name')}}</h1>
                    @endif
                    <img src="{{system_config('site_logo')}}" style="height: 46px" class="logo-display">
                    <img src="{{system_config('site_logo')}}" style="height: 46px" class="logo-scrolled">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="ti-menu-alt"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav ms-auto">
                        @foreach(navs() as $key => $nav)
                            <li class="nav-item @if(isset($nav['child'])) dropdown @endif">
                                <a class="nav-link {{$nav->style_class}}" style="{{$nav->style_css}}" id="{{$nav->style_id}}" href="{{$nav->url}}" target="{{$nav->target}}"> {{$nav->name}} </a>
                                @if(isset($nav['child']) && $nav['child'])
                                <ul class="dropdown-menu fade-up">
                                    @foreach($nav['child'] as $child)
                                    <li>
                                        <a class="dropdown-item {{$child->style_class}}" style="{{$child->style_css}}" id="{{$child->style_id}}" target="{{$child->target}}" href="{{$child->url}}">
                                            {{$child->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div> <!-- navbar-collapse.// -->
                <div class="header-cart-btn">
                    {{--<i class="fas fa-cart-arrow-down"></i>--}}
                    @if(auth()->user())
                    <a href="/user" class="btn-6">会员中心</a>
                        @else
                        <a href="/user" class="btn-6">登录/注册</a>
                    @endif
                </div>
            </div> <!-- container -->
        </nav>
    </div>
</header>
<!-- End header -->
