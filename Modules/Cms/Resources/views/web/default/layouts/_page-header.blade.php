<header id="home" class="header-style-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <div id="logo-2">
                    <a href="/">
                        <img src="{!! system_config('site_logo') !!}" height="230px" class="standard-logo" alt="">
                    </a>
                </div>
                <div id="mobile-button">
                    <hr><hr><hr>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div id="menu-container" class="sticky">
        <div class="container col-md-12">
            <nav>
                <ul class="clearfix">
                    <li><a href="{{cms_home_path()}}">Home</a></li>

                    @foreach(cms_categories() as $category)
                        <li><a href="{{route('cms.category',$category->id)}}">{{$category->name}}</a>
                            @if($category['child'])
                                <ul class="sub-menu">
                                    @foreach($category['child'] as $child)
                                    <li><a href="{{route('cms.category',$child->id)}}">{{$child->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                </ul>
            </nav>
        </div>
    </div>
</header>
<section id="section-featured" class="clearfix">
    <div id="prev-owl">
        <i class="fa fa-chevron-left"></i>
    </div>
    <div id="next-owl">
        <i class="fa fa-chevron-right"></i>
    </div>
    <div id="featured">
        @foreach(cms_img_articles() as $article)
        <div>
            <a href="{{route('cms.single',$article->id)}}"><img src="{{$article->img}}" alt=""></a>
            <span>{{$article->title}}</span>
        </div>
        @endforeach
    </div>
</section>
