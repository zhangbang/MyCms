@include("template::mycms.views._header")
<main class="main">

    <!-- Start Breadcrumb
    ============================================= -->
    <div class="site-breadcrumb" style="background: url(/mycms/cms/theme/mycms/assets/img/breadcrumb/breadcrumb.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">会员中心</h2>
            <ul class="breadcrumb-menu clearfix">
                <li><a href="{{home_path()}}">网站首页</a></li>
                <li class="active">会员中心</li>
            </ul>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Profile
    ============================================= -->
    <div class="profile-area de-padding">
        <div class="container">
            <div class="profile-wpr">
                <div class="row ps g-5">
                    <div class="col-lg-8">
                        <div class="profile-setting wow fadeInLeft">
                            <img src="https://static.mycms.net.cn/public/logo-2.png">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="user-profile">
                            <div class="user-profile-pic">
                                <img src="{{auth()->user()->img ?: '/mycms/cms/theme/mycms/assets/img/user/user-default-img.png'}}">
                                <div class="user-profile-bio">
                                    <h5 class="work-title">{{auth()->user()->nickname ?: auth()->user()->name}}</h5>
                                    <span>普通会员</span>
                                </div>
                            </div>

                            <div class="profile-list">
                                <div class="category-list">
                                    <div class="profile-btn">
                                        <a href="{{user_logout_path()}}" class="btn-2">
                                            <i>
                                                <img src="/mycms/cms/theme/mycms/assets/img/icons/login.png">
                                            </i>
                                            退出登录
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="full-width">
                <span class="icon icon-circle-1 wow zoomIn animated"><img src="/mycms/cms/theme/mycms/assets/img/icons/icon-circle-1.png"></span>
                <span class="icon zoominout"><img src="/mycms/cms/theme/mycms/assets/img/icons/4.png"></span>
            </div>
        </div>
    </div>
    <!-- End Profile -->

</main>

<div class="clearfix"></div>

@include("template::mycms.views._footer")
