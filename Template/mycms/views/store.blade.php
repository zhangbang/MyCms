@include("template::mycms.views._header")
<main class="main">

    <!-- Start Breadcrumb
    ============================================= -->
    <div class="site-breadcrumb" style="background: url(/mycms/cms/theme/mycms/assets/img/breadcrumb/breadcrumb.jpg)">
        <div class="container">
            @if (is_store())
                <h1 class="breadcrumb-title">插件市场</h1>
            @else
                <h1 class="breadcrumb-title">{{$category->name}}</h1>
            @endif
            <ul class="breadcrumb-menu clearfix">
                <li><a href="{{home_path()}}">网站首页</a></li>
                @if (is_store())
                    <li class="active">插件市场</li>
                @else
                    <li><a href="{{store_path()}}">插件市场</a></li>
                    <li class="active">{{$category->name}}</li>
                @endif

            </ul>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Product
    ============================================= -->
    <div class="product-area de-padding">
        <div class="container">
            <div class="product-wpr">
                <div class="row ps g-5">
                    <div class="col-xl-8">
                        <div class="product-grid-app grid-2">
                            @foreach($goods = goods($page) as $item)
                                <div class="work-box wow fadeInUp">
                                    <a href="{{goods_path($item->id)}}" class="work-pic">
                                        <img src="{{$item->goods_image}}">
                                    </a>
                                    <div class="work-desc">
                                        <a href="{{goods_path($item->id)}}">
                                            <h5 class="work-title">
                                                {{$item->goods_name}}
                                            </h5>
                                        </a>
                                        <div class="work-meta">
                                            <ul class="space-between">
                                                <li>{{$item->description}}</li>
                                            </ul>
                                        </div>
                                        <div class="work-bottom space-between">
                                            <div class="work-price">
                                                <span class="value">￥{{$item->shop_price}}</span>
                                            </div>
                                            <div class="work-btns">
                                                <ul>
                                                    <li>{{$item->view}} 浏览</li>
                                                    <li><a href="{{goods_path($item->id)}}" class="btn-7">详情</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $goods->links('template::mycms.views._page') }}
                    </div>
                    <div class="col-xl-4">
                        <aside class="sidebar">
                            <!-- Search-->
                            <div class="widget search">
                                <h5 class="work-title">搜索插件</h5>
                                <form class="search-form">
                                    <input type="text" class="input-style-2" id="search" placeholder="请输入关键词...">
                                    <button class="btn-sub" type="button"
                                            onclick="location.href = '/store?search=' + $('#search').val();">
                                        <i><img src="/mycms/cms/theme/mycms/assets/img/icons/search.png"></i>
                                    </button>
                                </form>
                            </div>
                            <!-- Category -->
                            <div class="widget category">
                                <h5 class="work-title">插件分类</h5>
                                <div class="category-list">
                                    <ul>
                                        @foreach(store_category() as $category)
                                            <li>
                                                <a href="{{store_category_path($category->id)}}">

                                                    <span>{{$category->name}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="widget category" style="margin-top: 15px">
                                <h5 class="work-title">专属推荐</h5>
                                <div class="category-list">
                                    <ul>
                                        <a href="https://cloud.tencent.com/act/cps/redirect?redirect=1040&cps_key=9c8403980e4808728cd2ca82019a132e&from=console"
                                           rel="nofollow" target="_blank"
                                           style="background:#007bff;height:50px;line-height:50px;font-size:16px;color:#fff;text-align:center;display:block;cursor:pointer;margin-bottom:10px;">
                                            新客户专属大礼包（2860元代金券） </a>

                                        <a href="https://www.aliyun.com/activity/new?userCode=zk44pwi7" rel="nofollow"
                                           target="_blank"
                                           style="background:#ff6a00;height:50px;line-height:50px;font-size:16px;color:#fff;text-align:center;display:block;cursor:pointer;margin-bottom:10px;">
                                            阿里云服务器1核/2G/1M(72.6元/1年) </a>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget" style="margin-top: 15px">
                                {!! ad('right-ad') !!}
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product -->

</main>

<div class="clearfix"></div>
@include("template::mycms.views._footer")
