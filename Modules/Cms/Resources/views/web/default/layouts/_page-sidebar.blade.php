<aside id="sidebar">

    <div class="widget">
        <h4>About</h4>
        <p>MyCms是一款基于Laravel8+layuimini开发的模块化后台管理系统。MyCms基于Apache2.0开源协议发布，免费且不限制商业使用，欢迎持续关注我们。</p>
    </div>
    <div class="widget">
        <h4>Find me on</h4>
        <p>
            <a href="#" class="social-1"><i class="fa fa-facebook"></i></a>
            <a href="#" class="social-1"><i class="fa fa-twitter"></i></a>
            <a href="#" class="social-1"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="social-1"><i class="fa fa-linkedin"></i></a>
        </p>
    </div>
    <div class="widget">
        <h4>Latest Posts</h4>
        <ul>
            @foreach(cms_new_articles() as $article)
            <li><a href="{{cms_single_path($article->id)}}">{{$article->title}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <h4>Categories</h4>
        <ul>
            @foreach(cms_categories() as $category)
            <li><a href="{{cms_category_path($category->id)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget tagcloud">
        <h4>Tags</h4>
        @foreach(cms_tags() as $tag)
        <a href="{{cms_tag_path($tag->id)}}">{{$tag->tag_name}}</a>
        @endforeach
    </div>
</aside>
