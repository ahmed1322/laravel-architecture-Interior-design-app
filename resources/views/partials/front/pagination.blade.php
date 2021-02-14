@if($paginator->hasPages())
<div class="col-lg-12">
    <ul class="page-pagination none-style">

        @if(!$paginator->onFirstPage())
            <li><a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}"><i class="ot-flaticon-left-arrow"></i></a></li>
        @endif

        @foreach($elements[0] as $page_number => $url)
            @if( $page_number == $paginator->currentPage() )
            <li><span class="page-numbers current">{{ $page_number }}</span></li>
            @else
            <li><a href="{{ $url }}" class="page-numbers">{{ $page_number }}</a></li>
            @endif
        @endforeach

        @if($paginator->hasMorePages())
            <li><a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="ot-flaticon-right-arrow"></i></a></li>
        @endif

    </ul>
</div>
@endif
