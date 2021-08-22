@include("cms::web.default.layouts._header")


<div id="page-container">
    @include("cms::web.default.layouts._page-header")
    <section id="page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 column">
                    @foreach($articles = cms_new_articles() as $article)
                    <article class="post">
                        <header>
                            @if(isset($article->img))
                            <div class="media">
                                <a href="{{route('cms.single',$article->id)}}"><img src="{{$article->img}}" alt="{{$article->title}}"></a>
                            </div>
                            @endif
                            <h3><a href="{{route('cms.single',$article->id)}}">{{$article->title}}</a></h3>
                            <span>{{$article->created_at}} / by <a href="javascript:">{{$article->author}}</a> / in: <a href="{{route('cms.category',$article->category->id)}}">{{$article->category->name}}</a></span>
                        </header>
                        <div class="editor-styles">
                            <p>{{$article->description}}</p>
                        </div>
                        <footer>
                            <div>
                                <a href="{{route('cms.single',$article->id)}}">Continue Reading...</a>
                            </div>
                            <hr>
                        </footer>
                    </article>
                    @endforeach
                    <nav id="post-nav">
                        {{ $articles->links() }}
                    </nav>
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