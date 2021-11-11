@include("template::default.views.layouts._header")


<div id="page-container">
    @include("template::default.views.layouts._page-header")
    <section id="page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 column">
                    <article class="post clearfix">
                        <header>
                            @if(isset($article->img))
                                <div class="media">
                                    <a href="{{cms_single_path($article->id)}}"><img src="{{$article->img}}" alt="{{$article->title}}"></a>
                                </div>
                            @endif
                            <h1><a href="{{cms_single_path($article->id)}}">{{$article->title}}</a></h1>
                                <span>{{$article->created_at}} / by <a href="javascript:">{{$article->author}}</a> / in: <a href="{{cms_category_path($article->category->id)}}">{{$article->category->name}}</a></span>
                        </header>
                        {!! call_hook_function('ad','single_ad') !!}
                        <div class="editor-styles">
                            {!! $article->content !!}
                        </div>
                        <footer>
                            <div>
                                @foreach(cms_article_tags($article->id) as $tag)
                                    <a href="{{cms_tag_path($tag['id'])}}">{{$tag['tag_name']}}</a>
                                @endforeach
                            </div>
                            <hr>
                        </footer>
                    </article>

                </div>
                <div class="col-lg-4 col-sm-4 column space">
                    @include("template::default.views.layouts._page-sidebar")
                </div>
            </div>
        </div>
    </section>
    @include("template::default.views.layouts._page-footer")
</div>


@include("template::default.views.layouts._bottom")