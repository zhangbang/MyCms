@include("template::mycms.views._header")
<main class="main">

    <!-- Start Slider
    ============================================= -->
    <div class="hero-section">
        <div class="hero-single bg-2">
            <div class="hero-shape">
                <img src="/mycms/cms/theme/mycms/assets/img/header/header-vc.png" >
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="hero-content">
                            <h2 class="hero-title">
                                Hello，MyCms
                            </h2>
                            <p>
                                MyCms是一款基于Laravel开发的开源免费的自媒体博客CMS系统，适用于个人网站及企业网站开发使用，软件著作权编号：2021SR1543432。MyCms基于Apache2.0开源协议发布，免费且不限制商业使用，欢迎持续关注我们。
                            </p>
                            <div class="hero-btn">
                                <a href="https://www.kancloud.cn/b386654667/mycms" target="_blank" rel="nofollow" class="btn-4">使用文档</a>
                                <a href="https://gitee.com/qq386654667/mycms" target="_blank" rel="nofollow" class="btn-5">获取代码</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="hero-right-pic wow fadeInRight">
                            <img src="/mycms/cms/theme/mycms/assets/img/header/hero-left-pic.png">
                            <div class="hero-social-move">
                                <ul class="hero-social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start work
    ============================================= -->
    <div id="portfolio" class="portfolio-area bg-white de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="site-title text-center" style="margin-bottom: 0px;">
                        <h2>优秀案例</h2>
                        <p class="mb-0">
                            这些系统基于MyCms开发，快速集成，快速上线，获取流量
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid c-pd">
            <div class="portfolio-items-area">
                <div class="row">
                    <div class="col-xl-12 portfolio-content">
                        {{--<div class="mix-item-menu active-theme text-center">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".development">Web Themes</button>
                            <button data-filter=".design">Mobile Apps</button>
                            <button data-filter=".photography">Dashboard</button>
                        </div>--}}
                        <!-- End Mixitup Nav-->
                        <div class="magnific-mix-gallery masonary">
                            <div id="portfolio-grid" class="portfolio-items">
                                <div class="pf-item design wow fadeInUp">
                                    <div class="work-box">
                                        <div class="work-pic">
                                            <img src="https://static.mycms.net.cn/public/demo/gsc.png" alt="古诗词网">
                                            <a href="https://static.mycms.net.cn/public/demo/gsc.png" data-fancybox="gallery"
                                               class="item work-popup">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="work-desc" style="padding-bottom: 0">
                                            <a href="https://www.gushici.top/" target="_blank">
                                                <h5 class="work-title" style="margin-bottom: 0;text-align: center">
                                                    古诗词网
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item development wow fadeInUp">
                                    <div class="work-box">
                                        <div class="work-pic">
                                            <img src="https://static.mycms.net.cn/public/demo/zxjs.png" alt="在线计算网">
                                            <a href="https://static.mycms.net.cn/public/demo/zxjs.png" data-fancybox="gallery"
                                               class="item work-popup">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="work-desc" style="padding-bottom: 0">
                                            <a href="https://www.zaixianjisuan.com/" target="_blank">
                                                <h5 class="work-title" style="margin-bottom: 0;text-align: center">
                                                    在线计算网
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item photography wow fadeInUp">
                                    <div class="work-box">
                                        <div class="work-pic">
                                            <img src="https://static.mycms.net.cn/public/demo/nav.png" alt="程序员导航">
                                            <a href="https://static.mycms.net.cn/public/demo/nav.png" data-fancybox="gallery"
                                               class="item work-popup">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="work-desc" style="padding-bottom: 0">
                                            <a href="https://nav.mycms.net.cn/" target="_blank">
                                                <h5 class="work-title" style="margin-bottom: 0;text-align: center">
                                                    程序员导航
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Work -->

    <!-- Start Latest Themes
    ============================================= -->
    <div class="latest-thm ltl bg de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="site-title text-center">
                        <h2>插件市场</h2>
                        <p class="mb-0">
                            基于MyCms开发的插件，快速集成，快速上线！
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid c-pd">
            <div class="latest-pill-content">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">
                        <div class="latest-wpr magnific-mix-gallery grid-3">
                            @foreach(shop_new_goods(0,6) as $goods)
                            <div class="work-box wow zoomIn">
                                <div class="work-pic">
                                    <img src="{{$goods->goods_image}}" alt="{{$goods->goods_name}}">
                                    <a href="{{$goods->goods_image}}" data-fancybox="gallery" class="item work-popup">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="work-desc">

                                    <a href="{{shop_goods_path($goods->id)}}">
                                        <h5 class="work-title">
                                            {{$goods->goods_name}}
                                        </h5>
                                    </a>

                                    <div class="work-meta">
                                        <ul class="space-between">
                                            <li>{{$goods->description}}</li>
                                        </ul>
                                    </div>

                                    <div class="work-bottom space-between">
                                        <div class="work-price">
                                            <span class="value">￥{{$goods->shop_price}}</span>
                                            <div class="price-rating d-flex align-items-center">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="work-btns">
                                            <ul>
                                                <li>{{$goods->view}} 浏览</li>
                                                <li><a href="{{shop_goods_path($goods->id)}}" class="btn-7">详情</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="work-view text-center mt-70">
            <a href="{{shop_path()}}" class="btn-4">插件市场</a>
        </div>
    </div>
    <!-- End Latest Themes -->

    <!-- Start Services
    ============================================= -->
    <div class="sevice-area de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="site-title text-center">
                        <h2>系统特性</h2>
                        <p class="mb-0">
                            MyCms的每一项功能都为你精心雕琢!
                        </p>
                    </div>
                </div>
            </div>
            <div class="service-wpr grid-3">
                <div class="service-box wow fadeInRight">
                    <div class="service-icon">
                        <i><img src="/mycms/cms/theme/mycms/assets/img/icons/sv-1.png" ></i>
                    </div>
                    <div class="service-desc">
                        <h5 class="work-title">权限管理</h5>
                        <p class="mb-0">
                            基于Laravel中间件实现更智能完善的RBAC权限管理，自动读取更新，无需手动插入节点。
                        </p>
                    </div>
                </div>
                <div class="service-box wow fadeInRight">
                    <div class="service-icon">
                        <i><img src="/mycms/cms/theme/mycms/assets/img/icons/sv-2.png" ></i>
                    </div>
                    <div class="service-desc">
                        <h5 class="work-title">模块化开发</h5>
                        <p class="mb-0">
                            采用Laravel-module实现模块化，降低耦合度，分工更明确，专业的事情留给专业的功能处理
                        </p>
                    </div>
                </div>
                <div class="service-box wow fadeInRight">
                    <div class="service-icon">
                        <i><img src="/mycms/cms/theme/mycms/assets/img/icons/sv-3.png" ></i>
                    </div>
                    <div class="service-desc">
                        <h5 class="work-title">响应式开发</h5>
                        <p class="mb-0">
                            基于Bootstrap和LayUi进行二次开发,手机、平板、PC均自动适配,无需担心兼容性问题，专注业务逻辑代码开发
                        </p>
                    </div>
                </div>
                <div class="service-box wow fadeInRight">
                    <div class="service-icon">
                        <i><img src="/mycms/cms/theme/mycms/assets/img/icons/sv-4.png" ></i>
                    </div>
                    <div class="service-desc">
                        <h5 class="work-title">功能更强大</h5>
                        <p class="mb-0">
                            目前功能有管理后台、CMS内容管理、会员管理和商品管理，不再仅仅是一个后台.
                        </p>
                    </div>
                </div>
                <div class="service-box wow fadeInRight">
                    <div class="service-icon">
                        <i><img src="/mycms/cms/theme/mycms/assets/img/icons/sv-5.png" ></i>
                    </div>
                    <div class="service-desc">
                        <h5 class="work-title">深耕领域</h5>
                        <p class="mb-0">
                            不图多，只求精。深耕自媒体博客、SEO优化领域，帮助个人实现知识、技术变现。
                        </p>
                    </div>
                </div>
                <div class="service-box wow fadeInRight">
                    <div class="service-icon">
                        <i><img src="/mycms/cms/theme/mycms/assets/img/icons/sv-6.png" ></i>
                    </div>
                    <div class="service-desc">
                        <h5 class="work-title">持续更新</h5>
                        <p class="mb-0">
                            接收用户的反馈建议，为大家解决各种使用中的问题。结合市场风向，不断更新系统.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->

    <!-- Start Why Choose Us
    ============================================= -->
    <div class="wh-area bg-2 wh-pd de-padding">
        <div class="container">
            <div class="wh-wpr">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="wh-left">
                            <h2 class="wh-title">
                                为什么选择我们？
                            </h2>
                            <p>
                                MyCms自发布以来，得到大家的认可和接受，冰冻三日，非一日之寒。
                                我们还年轻，请您多帮助！您的每一次意见与建议我们都会虚心接受！让我们一起在知识技术变现的路上越走越好！
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="wh-right grid-2">
                            <div class="wh-box wow fadeInUp">
                                <div class="wh-icon">
                                    <i><img src="/mycms/cms/theme/mycms/assets/img/icons/ft-1.png" ></i>
                                </div>
                                <div class="wh-desc">
                                    <h5 class="work-title">接收反馈</h5>
                                    <p class="mb-0">
                                        与作者QQ群面对面交流，接受反馈与建议，共同成长
                                    </p>
                                </div>
                            </div>
                            <div class="wh-box wow fadeInUp">
                                <div class="wh-icon">
                                    <i><img src="/mycms/cms/theme/mycms/assets/img/icons/ft-2.png" ></i>
                                </div>
                                <div class="wh-desc">
                                    <h5 class="work-title">开源授权</h5>
                                    <p class="mb-0">
                                        基于Apache2.0开源协议发布，无需授权即可商业使用，代码全部开源免费且无任何加密。
                                    </p>
                                </div>
                            </div>
                            <div class="wh-box wow fadeInUp">
                                <div class="wh-icon">
                                    <i><img src="/mycms/cms/theme/mycms/assets/img/icons/ft-3.png" ></i>
                                </div>
                                <div class="wh-desc">
                                    <h5 class="work-title">插件丰富</h5>
                                    <p class="mb-0">
                                        插件能满足系统基本运营需求，且还在不断开发实用插件
                                    </p>
                                </div>
                            </div>
                            <div class="wh-box wow fadeInUp">
                                <div class="wh-icon">
                                    <i><img src="/mycms/cms/theme/mycms/assets/img/icons/ft-4.png" ></i>
                                </div>
                                <div class="wh-desc">
                                    <h5 class="work-title">接受定制</h5>
                                    <p class="mb-0">
                                        有更好想法，让您的想法快速落地，接受系统插件定制实现双赢
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us -->

    <!-- Start Counter
    ============================================= -->
    <div class="counter-area">
        <div class="container">
            <div class="counter-wpr counter-round grid-4 wow fadeInLeft">
                <div class="fun-fact">
						<span class="fun-icon">
                            <i>
                                <img src="/mycms/cms/theme/mycms/assets/img/icons/fn-1.png" >
                            </i>
                        </span>
                    <div class="fun-desc">
                        <p class="timer" data-count="+" data-to="1200" data-speed="3000">1200</p>
                        <span class="medium">Gitee Ip</span>
                    </div>
                </div>
                <div class="fun-fact fun-active">
						<span class="fun-icon">
                            <i>
                                <img src="/mycms/cms/theme/mycms/assets/img/icons/fn-2.png" >
                            </i>
                        </span>
                    <div class="fun-desc">
                        <p class="timer" data-count="+" data-to="200" data-speed="3000">50</p>
                        <span class="medium">Download zip</span>
                    </div>
                </div>
                <div class="fun-fact">
						<span class="fun-icon">
                            <i>
                                <img src="/mycms/cms/theme/mycms/assets/img/icons/fn-3.png" >
                            </i>
                        </span>
                    <div class="fun-desc">
                        <p class="timer" data-count="+" data-to="30" data-speed="3000">30</p>
                        <span class="medium">Starred</span>
                    </div>
                </div>
                <div class="fun-fact">
						<span class="fun-icon">
                            <i>
                                <img src="/mycms/cms/theme/mycms/assets/img/icons/fn-4.png" >
                            </i>
                        </span>
                    <div class="fun-desc">
                        <p class="timer" data-count="+" data-to="200" data-speed="3000">200</p>
                        <span class="medium">Pull</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Counter -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="site-title text-center">
                        <h2>博客动态</h2>
                    </div>
                </div>
            </div>
            <div class="blog-wpr grid-3">
                @foreach($articles = cms_new_articles(3) as $article)
                <div class="blog-box wow fadeInUp">
                    <div class="blog-pic">
                        <a href="{{cms_single_path($article->id)}}"><img src="@if(isset($article->img)) {{$article->img}} @else /mycms/cms/theme/mycms/assets/img/blog/1.jpg @endif" ></a>
                    </div>
                    <div class="blog-desc">
                        <div class="blog-meta">
                            <ul>
                                <li>
                                    <i><img src="/mycms/cms/theme/mycms/assets/img/icons/check-list.png" ></i>
                                    <span>{{created_at_date($article->created_at)}}</span>
                                </li>
                            </ul>
                        </div>
                        <a href="{{cms_single_path($article->id)}}">
                            <h5 class="work-title">
                                {{$article->title}}
                            </h5>
                        </a>
                        <p>
                            {{$article->description}}
                        </p>
                        <div class="work-btn">
                            <a href="{{cms_single_path($article->id)}}" class="btn-2">阅读更多
                                <i>
                                    <img src="/mycms/cms/theme/mycms/assets/img/icons/long-arrow.png" >
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Blog -->

</main>
@include("template::mycms.views._footer")
