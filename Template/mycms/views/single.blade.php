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
                                            <li>作者:{{$article->author}}</li>
                                            <li>分类: <a
                                                    href="{{cms_category_path($article->category->id)}}">{{$article->category->name}}</a>
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
                                                <li><a href="{{cms_tag_path($tag['id'])}}"
                                                       class="tags-link">{{$tag['tag_name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(isset($config['is_allow_comment']) && $config['is_allow_comment'] == 1)
                        <div class="single-comments-section blg-single">
                            <h4 class="single-content-title">评论列表</h4>
                            <div class="single-commentor">
                                @if(($comments = cms_article_comments($article->id)) && $comments->count() > 0)
                                    <ul>
                                        @foreach($comments as $comment)
                                            <li>
                                                <div class="single-commentor-user">
                                                    <img
                                                        src="{{$comment->user->img ?: '/mycms/cms/theme/mycms/assets/img/user/user-default-img.png'}}">
                                                    <div class="single-commentor-user-bio">
                                                        <div class="single-commentor-user-bio-head">
                                                            <h5>{{$comment->user->name}}</h5>
                                                        </div>
                                                        <p class="mb-20">
                                                            {{$comment->content}}
                                                        </p>
                                                        <a href="javascript:" onclick="reply(this)" class="share d-block"  data-id="{{$comment->id}}" data-user-name="{{$comment->user->name}}">
                                                            <img
                                                                src="/mycms/cms/theme/mycms/assets/img/icons/reply.png">
                                                            回复
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>

                                            @foreach(cms_article_comments($article->id,$comment->id) as $child)
                                            <li>
                                                <div class="single-commentor-user de-bpd">
                                                    <img src="{{$child->user->img ?: '/mycms/cms/theme/mycms/assets/img/user/user-default-img.png'}}">
                                                    <div class="single-commentor-user-bio">
                                                        <div class="single-commentor-user-bio-head">
                                                            <h5>{{$child->user->name}}</h5>
                                                        </div>
                                                        <p class="mb-20">
                                                            {{$child->content}}
                                                        </p>
                                                        <a href="javascript:" onclick="reply(this)" class="share d-block"  data-id="{{$child->id}}" data-user-name="{{$child->user->name}}">
                                                            <img src="/mycms/cms/theme/mycms/assets/img/icons/reply.png">
                                                            回复
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach

                                        @endforeach
                                    </ul>
                                @else
                                    <p style="text-align: center">空空如也~</p>
                                @endif
                            </div>
                            <div class="single-comments-section-form">
                                <h4 class="single-content-title">发表评论</h4>
                                <form method="post" id="comment" action="{{route('cms.single.comment.create')}}"
                                      onsubmit="return create_comment();">
                                    <div class="row g-5">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control input-style-2" rows="5" name="content"
                                                          id="content"></textarea>
                                            </div>

                                            @if(auth()->user())
                                                <input type="hidden" name="parent_id" value="0">
                                                <input type="hidden" name="single_id" value="{{$article->id}}">
                                                <button type="submit" class="btn-6 mt-30">提交评论</button>
                                            @else
                                                <button type="button" class="btn-6 mt-30">登录后评论</button>
                                            @endif

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar">
                            <!-- Search-->
                            <div class="widget search">
                                <h5 class="work-title">搜索文章</h5>
                                <form class="search-form">
                                    <input type="text" class="input-style-2" id="search" placeholder="请输入关键词...">
                                    <button class="btn-sub" type="button"
                                            onclick="location.href = '/search/' + $('#search').val();">
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

<script>
    function create_comment() {
        $.ajax({
            url: '{{route('cms.single.comment.create')}}',
            type: 'post',
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            dataType: "json",
            data: $('#comment').serialize(),
            timeout: 60000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                alert('系统已收到您的评论，经审核通过后将会显示');
                $('#content').val('');
                $('#content').attr('placeholder','');
            },
            error: function (xhr) {
                alert(xhr.responseJSON.msg);
                return false;
            }
        });

        return false;
    }

    function reply(obj) {
        var id = $(obj).data('id');
        var name = $(obj).data('user-name');

        $('#content').attr('placeholder', '回复 @' + name);
        $('input[name="parent_id"]').val(id);
    }
</script>

<div class="clearfix"></div>
@include("template::mycms.views._footer")
