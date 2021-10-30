@include("template::mycms.views._header")
<main class="main">

    <!-- Start Breadcrumb
    ============================================= -->
    <div class="site-breadcrumb" style="background: url(/mycms/cms/theme/mycms/assets/img/breadcrumb/breadcrumb.jpg)">
        <div class="container">
            <h1 class="breadcrumb-title">{{$article->title}}</h1>
            <ul class="breadcrumb-menu clearfix">
                <li><a href="{{cms_home_path()}}">网站首页</a></li>
                <li><a href="{{cms_category_path($article->category->id)}}">{{$article->category->name}}</a></li>
                <li class="active">{{$article->title}}</li>
            </ul>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog Single
    ============================================= -->
    <div class="blog-single-area de-padding">
        <div class="container">
            <div class="blog-single-wpr">
                <div class="row ps g-xl-5">
                    <div class="col-lg-8">
                        <div class="theme-single blog-single">
                            <div class="theme-pic">
                                <img src="{{$article->img}}" style="max-height: 350px" class="big-pic">
                            </div>
                            <div class="theme-info">
                                <div class="theme-meta">
                                    <div class="theme-meta-left">
                                        <ul>
                                            <li>By {{$article->author}}</li>
                                            <li>
                                                In <a href="{{cms_category_path($article->category->id)}}">{{$article->category->name}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="theme-meta-right">
                                        <div class="share-btn">
                                            <img src="/mycms/cms/theme/mycms/assets/img/icons/rc.png">
                                            {{created_at_date($article->created_at)}}
                                        </div>
                                    </div>
                                </div>
                                <div class="theme-desc">
                                    {!! $article->content !!}
                                    <div class="content-tags pb-20">
                                        <h5 class="mb-0">标签</h5>
                                        <ul>
                                            @foreach(cms_article_tags($article->id) as $tag)
                                                <li><a href="{{cms_tag_path($tag['id'])}}" class="tags-link">{{$tag['tag_name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar">
                            <!-- Search-->
                            <div class="widget search">
                                <h5 class="work-title">搜索文章</h5>
                                <form class="search-form">
                                    <input type="text" class="input-style-2" id="search" placeholder="请输入关键词...">
                                    <button class="btn-sub" type="button" onclick="location.href = '/search/' + $('#search').val();">
                                        <i><img src="/mycms/cms/theme/mycms/assets/img/icons/search.png"></i>
                                    </button>
                                </form>
                            </div>
                            <!-- Category -->
                            <div class="widget category">
                                <h5 class="work-title">分类</h5>
                                <div class="category-list">
                                    <ul>
                                        @foreach(cms_categories() as $category)
                                            <li>
                                                <a href="{{cms_category_path($category->id)}}">

                                                    <span>{{$category->name}}</span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <!-- Recent Post -->
                            <div class="widget recent-post">
                                <h5 class="work-title">最近文章</h5>
                                @foreach(cms_new_articles(3) as $article)
                                    <div class="recent-post-single">
                                        <div class="recent-post-pic">
                                            <img src="{{$article->img}}" style="width: 80px">
                                        </div>
                                        <div class="recent-post-bio">
                                            <h6>
                                                <a href="{{cms_single_path($article->id)}}">{{$article->title}}</a>
                                            </h6>
                                            <span>
												<i>
													<img src="/mycms/cms/theme/mycms/assets/img/icons/rc.png">
												</i>
												{{created_at_date($article->created_at)}}
											</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Recent Post -->

                            <div class="widget recent-post">
                                <h5 class="work-title">热门文章</h5>
                                @foreach(cms_sort_articles('view','desc',[],3) as $article)
                                    <div class="recent-post-single">
                                        <div class="recent-post-pic">
                                            <img src="{{$article->img}}" style="width: 80px">
                                        </div>
                                        <div class="recent-post-bio">
                                            <h6>
                                                <a href="{{cms_single_path($article->id)}}">{{$article->title}}</a>
                                            </h6>
                                            <span>
												<i>
													<img src="/mycms/cms/theme/mycms/assets/img/icons/rc.png">
												</i>
												{{created_at_date($article->created_at)}}
											</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="widget sidebar-tags">
                                <h5 class="work-title">标签</h5>
                                <div class="tags">
                                    @foreach(cms_tags() as $tag)
                                        <a href="{{cms_tag_path($tag->id)}}" class="tags-link">{{$tag->tag_name}}</a>
                                    @endforeach
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
