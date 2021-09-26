<!DOCTYPE html>
<html lang="zh-CN" id="moulemHtml" class="screen-desktop-wide device-desktop">
<head>
    <meta charset="UTF-8">
    <title>{{cms_the_title()}}</title>
    <meta name="keywords"
          content="{{cms_the_keyword()}}">
    <meta name="description"
          content="{{cms_the_description()}}">
    <link rel="stylesheet" type="text/css" href="/mycms/addons/nav/css/zui.min.css">
    <link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_716225_9byylqtxsca.css">
    <link rel="stylesheet" type="text/css" href="/mycms/addons/nav/css/jquery-ui.css">
    <link type="text/css" rel="stylesheet" href="/mycms/addons/nav/css/moulem.css">

    <script src="/mycms/addons/nav/js/jquery2.1.1.min.js" type='text/javascript'></script>
    <script type="text/javascript" src="/mycms/addons/nav/js/keyword.js"></script>
    <script type="text/javascript" src="/mycms/addons/nav/js/moulem.js"></script>

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

</head>
<body id="moulemBody">

<div class="w" id="w">
    <div id="main">
        <div id="bigBox">
            <div id="logoBox">
                <div id="logoLeft" title="">
                    <img src="{{system_config('site_logo')}}">
                </div>
            </div>
            <div id="search_bg">
                <div id="button_bg">
                    <div class="searchChoice">
                        <img src="/mycms/addons/nav/images/scbaidu.png" title="切换搜索引擎"
                                                   class="sChoiceBtn">
                        <div class="scBigBox" style="height: 0px; display: none;">
                            <div class="scSmallBox"><img src="/mycms/addons/nav/images/scbaidu.png" class="scImg"> <span
                                    class="scName">百度</span></div>
                            <div class="scSmallBox"><img src="/mycms/addons/nav/images/scsougou.png" class="scImg"> <span
                                    class="scName">搜狗</span></div>
                            <div class="scSmallBox"><img src="/mycms/addons/nav/images/scbing.png" class="scImg"> <span
                                    class="scName">必应</span></div>
                            <div class="scSmallBox"><img src="/mycms/addons/nav/images/sc360.png" class="scImg"> <span
                                    class="scName">360搜索</span></div>
                            <div class="scSmallBox"><img src="/mycms/addons/nav/images/scgoogle.png" class="scImg"> <span
                                    class="scName">Google</span></div>


                        </div>
                    </div>
                    <form action="" method="GET" target="_blank" id="searchCheck">
                        <input type="text" value="" lang="zh-CN" placeholder="听君一席话，白读十年书，还是搜索一下吧" name="https://www.baidu.com/s?wd=" id="search" autocomplete="off" class="textb"> <input
                            type="submit" value=" " id="searchBtn" class="subb" title="不填关键词试试">
                    </form>
                    <div class="promptText"><b>找点乐子？</b><br>不输入关键词点击搜<br>索图标或按回车键</div>
                    <div class="keyword"></div>
                </div>
            </div>
            <dl id="hSiteNav" class="sortable sort_category">
                @foreach(navs() as $key => $nav)
                    @if($key == 0)
                        <dd data-id="{{$nav->id}}" data-sort="0" class="hNav item currentHNav">
                            {{$nav->name}}
                        </dd>
                        @else
                        <dd data-id="{{$nav->id}}" data-sort="1" class="hNav item">
                            {{$nav->name}}
                        </dd>
                    @endif
                @endforeach
            </dl>
            <div class="website">

                @foreach(navs() as $key => $nav)
                    @if($nav['child'])
                        <ul id="ul-{{$nav->id}}" class="sortable sort_sour" @if($key > 0) style="display: none" @endif>
                            @foreach($nav['child'] as $child)
                            <li class="item">
                                <a target="{{$child->target}}" href="{{$child->url}}">
                                    <img width="20" src="{{$child->ico ?: $child->url . '/favicon.ico'}}" alt=""> <span class="text">{{$child->name}}</span></a>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
        </div>
        <div id="copyrightIndex">
            <div class="bottomButton">

                @foreach(friend_link() as $link)
                    <a href="{{$link->url}}" target="{{$link->target}}">{{$link->name}}</a>
                @endforeach

            <div class="bottomCopyright"><span>©{{system_config('site_name')}} 由<a href="https://www.mycms.net.cn/" target="_blank">MyCms</a> 强力驱动</span>&nbsp;
                @if(($icp = system_config('site_icp')) !== null)<a target="_blank" href="https://beian.miit.gov.cn">{{$icp}}</a>@endif&nbsp;
            </div>
        </div>
    </div>

</div>
</div>

<script>
    $(document).ready(
        function (){
            $('#hSiteNav .item').click(
                function (){
                    var id = $(this).data('id');
                    $('#hSiteNav .item').removeClass('currentHNav');
                    $(this).addClass('currentHNav');

                    $('.website ul').hide();
                    $('#ul-'+id).show();
                }
            );
        }
    );
</script>

</body>
</html>
