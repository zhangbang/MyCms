<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="render" content="webkit">
    <title>{{page_title()}}</title>
    <meta name="keywords" content="{{page_keyword()}}">
    <meta name="description" content="{{page_description()}}">
    <link rel="stylesheet" type="text/css" charset="utf-8" href="/mycms/addons/nav/css/normalize.css">
    <link rel="stylesheet" type="text/css" charset="utf-8" href="/mycms/addons/nav/css/mcss.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <script src='/mycms/addons/nav/js/jquery.js' type='text/javascript'></script>
    <script type="text/javascript" src='/mycms/addons/nav/js/mkeyword.js'></script>
    <script type="text/javascript" src='/mycms/addons/nav/js/mjs.js'></script>
    @if(($headerJs = system_config('site_header_js')) !== null)
        {!! $headerJs !!}
    @endif
</head>
<body style="zoom: 1;">
<div id="container">

    <section class="topBox">
        <div class="logoBox"><img src="{{system_config('site_logo')}}"></div>
        <div id="search_bg">
            <div id="button_bg">
                <div class="searchChoice">
                    <div class="sChoiceBtn" title="切换搜索引擎">
                        <img class="sChoiceBtnImg" src="/mycms/addons/nav/images/scbaidugray.png">
                    </div>
                    <div class="scBigBox">
                        <div class="scSmallBox">
                            <img class="scImg" src="/mycms/addons/nav/images/scbaidu.png">
                            <span class="scName">百度</span>
                        </div>
                        <div class="scSmallBox">
                            <img class="scImg" src="/mycms/addons/nav/images/scsougou.png">
                            <span class="scName">搜狗</span>
                        </div>
                        <div class="scSmallBox">
                            <img class="scImg" src="/mycms/addons/nav/images/scbing.png">
                            <span class="scName">必应</span>
                        </div>
                        <div class="scSmallBox">
                            <img class="scImg" src="/mycms/addons/nav/images/sc360.png">
                            <span class="scName">360搜索</span>
                        </div>
                        <div class="scSmallBox">
                            <img class="scImg" src="/mycms/addons/nav/images/scgoogle.png">
                            <span class="scName">Google</span>
                        </div>

                    </div>
                </div>
                <form action="https://www.baidu.com/s" method="GET" id="searchCheck">
                    <input type="text" value="" x-webkit-speech="" lang="zh-CN" placeholder="百度一下，你不知道" name="wd"
                           id="search" class="textb" autocomplete="off">

                    <button type="submit" value=" " class="subb" id="searchBtn"><img
                            src="/mycms/addons/nav/images/searchblack.png"></button>
                </form>
                <div class="keywordClose"><img src="/mycms/addons/nav/images/keywordClose.png"></div>
                <div class="keyword"></div>
            </div>
        </div>

        <ul class="topSiteBox" data-count="12">

            @foreach(navs() as $key => $nav)
                @if($key == 0)
                    @foreach($nav['child'] as $child)
                        <li><a target="{{$child->target}}" href="{{$child->url}}"><img
                                    src="{{$child->ico ?: $child->url . '/favicon.ico'}}">{{$child->name}}</a></li>
                    @endforeach
                @endif
            @endforeach
        </ul>

    </section>

    @foreach(navs() as $key => $nav)
        @if($key > 0)
            <section class="mSiteBox">
                <div class="mSiteTittle"><h3>{{$nav->name}}</h3>
                    <div class="tittleBg"></div>
                </div>
                <dl class="mSite">
                    @foreach($nav['child'] as $child)
                        <dd><a target="{{$child->target}}" href="{{$child->url}}">{{$child->name}}</a></dd>
                    @endforeach
                </dl>
            </section>
            <div class="grayLine"></div>
        @endif
    @endforeach
</div>

</body>
</html>
