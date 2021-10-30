@include("template::mycms.views._header")
<main class="main">

    <!-- Start Breadcrumb
    ============================================= -->
    <div class="site-breadcrumb" style="background: url(/mycms/cms/theme/mycms/assets/img/breadcrumb/breadcrumb.jpg)">
        <div class="container">
            <h1 class="breadcrumb-title">{{$category->name}}</h1>
            <ul class="breadcrumb-menu clearfix">
                <li><a href="{{cms_home_path()}}">网站首页</a></li>
                <li class="active">{{$category->name}}</li>
            </ul>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area de-padding">
        <div class="container">
            <div class="blog-wpr grid-3">
                @foreach($articles = cms_category_articles($category->id,12) as $article)
                <div class="blog-box wow fadeInUp">
                    @if(isset($article->img))
                    <a href="{{cms_single_path($article->id)}}" class="blog-pic">
                        <img src="{{$article->img}}" alt="{{$article->title}}" style="max-height: 220px;max-width: 340px">
                    </a>
                    @endif
                    <div class="blog-desc">
                        <div class="blog-meta">
                            <ul>
                                <li>
                                    <i><img src="/mycms/cms/theme/mycms/assets/img/icons/check-list.png"></i>
                                    <span>{{created_at_date($article->created_at)}}</span>
                                </li>
                                <li>
                                    <span><a href="{{cms_category_path($article->category->id)}}">{{$article->category->name}}</a></span>
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
                                    <img src="/mycms/cms/theme/mycms/assets/img/icons/long-arrow.png">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $articles->links('template::mycms.views._page') }}
    </div>
    <!-- End Blog -->

</main>

<div class="clearfix"></div>
@include("template::mycms.views._footer")
