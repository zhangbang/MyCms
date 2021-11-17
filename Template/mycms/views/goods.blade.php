@include("template::mycms.views._header")
<main class="main">

    <!-- Start Breadcrumb
    ============================================= -->
    <div class="site-breadcrumb" style="background: url(/mycms/cms/theme/mycms/assets/img/breadcrumb/breadcrumb.jpg)">
        <div class="container">
            <h1 class="breadcrumb-title">{{$goods->goods_name}}</h1>
            <ul class="breadcrumb-menu clearfix">
                <li><a href="{{home_path()}}">网站首页</a></li>
                <li><a href="{{store_path()}}">插件市场</a></li>
                <li class="active">{{$goods->goods_name}}</li>
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
                        <div class="theme-single">
                            <div class="theme-pic">
                                <figure class="image big-pic" style="text-align: center"><img
                                        src="{{$goods->goods_image}}"></figure>
                                <div class="theme-ovll"><a href="{{$goods->goods_image}}" class="lightbox-image"
                                                           data-fancybox="gallery"><img
                                            src="/mycms/cms/theme/mycms/assets/img/icons/prev.png" alt=""></a></div>
                            </div>
                            <div class="theme-info">
                                <div class="theme-meta">
                                </div>
                                <div class="theme-desc mb-30">
                                    {!! $goods->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <aside class="sidebar">
                            <!-- Price Widget -->
                            <div class="theme-single-pill" style="margin-bottom: 3rem;">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" onclick="$('#radio--1').click();" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true">
                                            标准授权
                                        </button>
                                    </li>
                                    <li class="nav-item" onclick="$('#radio--2').click();" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">
                                            高级授权
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
                                        <div class="price">
                                            <h5 class="plan-title">
                                                <i class="fa fa-check"></i>一年内免费更新升级
                                                <br/>
                                                <i class="fa fa-check"></i>可用在自营项目，禁止用于外包
                                                <br/>
                                                <i class="fa fa-check"></i>提供源码，离线独立部署
                                                <br/>
                                                <i class="fa fa-check"></i>QQ群技术支持
                                                <br/>
                                                <i class="fa fa-check"></i>正版授权，允许商业使用
                                                <br/>
                                                <i class="fa fa-times"></i>禁止转售应用模块源码
                                            </h5>
                                            <div class="theme-price-plan">
                                                <div class="theme-price-single">
                                                    <div class="theme-price-radio">
                                                        <input class="form-check-input" type="radio" name="empower"
                                                               value="1" id="radio--1" checked>
                                                        <label class="form-check-label" for="radio--1">
                                                            标准授权
                                                        </label>
                                                    </div>
                                                    <span class="theme-price-value">￥{{$goods->shop_price}}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                         aria-labelledby="pills-profile-tab">
                                        <div class="price">
                                            <h5 class="plan-title">
                                                <span style="color: green"><i
                                                        class="fa fa-check"></i>长期免费更新升级</span><br/>
                                                <span style="color: green"><i
                                                        class="fa fa-check"></i>支持自营项目、外包项目使用</span><br/>
                                                <i class="fa fa-check"></i>提供源码，离线独立部署<br/>
                                                <i class="fa fa-check"></i>QQ群技术支持<br/>
                                                <i class="fa fa-check"></i>正版授权，允许商业使用<br/>
                                                <i class="fa fa-times"></i>禁止转售应用模块源码
                                            </h5>
                                            <div class="theme-price-plan">
                                                <div class="theme-price-single">
                                                    <div class="theme-price-radio">
                                                        <input class="form-check-input" type="radio" name="empower"
                                                               value="2" id="radio--2">
                                                        <label class="form-check-label" for="radio--2">
                                                            高级授权
                                                        </label>
                                                    </div>
                                                    <span class="theme-price-value">￥{{$goods->market_price}}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div>
                                        @if(auth()->user())
                                            <a href="javascript:buy()" class="btn-6 login-btn"
                                               style="width: 100%;text-align: center;">立即购买</a>
                                        @else
                                            <a href="{{route('user.login')}}" class="btn-6 login-btn"
                                               style="width: 100%;text-align: center;">请登录后购买</a>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{route('page.statement')}}" target="_blank" class="btn-11">插件协议 & 免责声明</a>
                                    </div>
                                </div>


                            </div>

                            <!-- Category -->
                            <div class="widget category" style="margin-top: 15px">
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

<div class="widget category" id="qrcode-box" style="display: none;background-color: white;padding-top: 15px;padding-bottom: 15px;">
    <h5 class="work-title" style="margin-bottom: 15px;font-weight: normal;color: var(--clr-def)">支付宝扫码<span style="float: right"><a href="javascript:" onclick="$('#qrcode-box').hide();">[取消]</a> </span></h5>
    <div id="qrcode"></div>
</div>



<script src="/mycms/cms/theme/mycms/assets/js/qrcode.min.js"></script>
<script>
    function buy() {
        $.ajax({
            url: '{{route('store.create.order')}}',
            type: 'post',
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            dataType: "json",
            data: {
                "goods_id": {{$goods->id}},
                "empower": $('input[name="empower"]:checked').val()
            },
            timeout: 60000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                $('#qrcode').html('');
                new QRCode(document.getElementById("qrcode"), res.pay_url);

                var left = ($(window).width() - 256) / 2;
                var top = ($(window).height() - 256) / 2;
                top += $(window).scrollTop();

                $('#qrcode-box').css({'left': left + 'px','top': top + 'px', 'position': 'absolute', 'z-index': 2});
                $('#qrcode-box').show();
            },
            error: function (xhr) {
                alert(xhr.responseJSON.msg);
                return false;
            }
        });
    }
</script>

<div class="clearfix"></div>
@include("template::mycms.views._footer")
