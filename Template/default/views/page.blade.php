<nav id="post-nav">

    @if (($paginator->currentPage()) > 1)
        <a style="float: left;" href="{{cms_page_url($paginator->currentPage() - 1)}}">
            « 上一页
        </a>
    @endif

    @if ($paginator->currentPage() < $paginator->lastPage())
    <a href="{{cms_page_url($paginator->currentPage() + 1)}}">下一页 »</a>
    @endif
</nav>
