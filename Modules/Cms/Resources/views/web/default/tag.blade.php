@include("cms::web.default.layouts._header")


<div id="page-container">
    @include("cms::web.default.layouts._page-header")
    <section id="page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 column">
                    <header id="header-section">
                        <h3>{{$tag->tag_name}}</h3>
                        <div></div>
                        <span>Tag</span>
                    </header>
                    @foreach($articles = cms_tag_articles($tag->id) as $article)
                        <article class="post">
                            <header>
                                @if(isset($article->img))
                                    <div class="media">
                                        <a href="{{cms_single_path($article->id)}}"><img src="{{$article->img}}" alt="{{$article->title}}"></a>
                                    </div>
                                @endif
                                <h3><a href="{{cms_single_path($article->id)}}">{{$article->title}}</a></h3>
                                <span>{{$article->created_at}} / by <a href="javascript:">{{$article->author}}</a> / in: <a href="{{cms_category_path($article->category->id)}}">{{$article->category->name}}</a></span>
                            </header>
                            <div class="editor-styles">
                                <p>{{$article->description}}</p>
                            </div>
                            <footer>
                                <div>
                                    <a href="{{cms_single_path($article->id)}}">Continue Reading...</a>
                                </div>
                                <hr>
                            </footer>
                        </article>
                    @endforeach
                    @if(!is_array($articles))
                        {{ $articles->links('cms::web.default.page') }}
                    @endif
                </div>
                <div class="col-lg-4 col-sm-4 column space">
                    @include("cms::web.default.layouts._page-sidebar")
                </div>
            </div>
        </div>
    </section>
    @include("cms::web.default.layouts._page-footer")
</div>


@include("cms::web.default.layouts._bottom")
