<div class="pagination cnt">
    @if (($paginator->currentPage()) > 1)
        <a style="float: left;" href="{{cms_page_url($paginator->currentPage() - 1)}}">
            «
        </a>
    @endif

    @if (($paginator->currentPage() - 1) >= 2)
        @for($i = $paginator->currentPage() - 2;$i < $paginator->currentPage();$i++)
            <a href="{{cms_page_url($i)}}">{{$i}}</a>
        @endfor
    @endif

    @if (($paginator->lastPage() - $paginator->currentPage()) >= 3)
        @for($i = $paginator->currentPage();$i < ($paginator->currentPage()+3);$i++)
            @if($i == $paginator->currentPage())
                <a href="javascript:" style="background-color: var(--clr-def);color: white">{{$i}}</a>
            @else
                <a href="{{cms_page_url($i)}}">{{$i}}</a>
            @endif

        @endfor
    @endif
    @if ($paginator->currentPage() < $paginator->lastPage())
        <a href="{{cms_page_url($paginator->currentPage() + 1)}}"> »</a>
    @endif
</div>
