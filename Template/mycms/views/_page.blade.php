<div class="pagination cnt">
    @if (($paginator->currentPage()) > 1)
        <a style="float: left;" href="{{cms_page_url($paginator->currentPage() - 1)}}">
            «
        </a>
    @endif



    @for($i = $paginator->currentPage() - 2;$i < $paginator->currentPage();$i++)
        @if ($i >= 1)
            <a href="{{cms_page_url($i)}}">{{$i}}</a>
        @endif
    @endfor

    <a href="javascript:" style="background-color: var(--clr-def);color: white">{{$paginator->currentPage()}}</a>

    @for($i = $paginator->currentPage() + 1;$i <= $paginator->lastPage();$i++)
        @if ($i <= $paginator->currentPage() + 3)
            <a href="{{cms_page_url($i)}}">{{$i}}</a>
        @endif
    @endfor




    @if ($paginator->currentPage() < $paginator->lastPage())
        <a href="{{cms_page_url($paginator->currentPage() + 1)}}"> »</a>
    @endif
</div>
