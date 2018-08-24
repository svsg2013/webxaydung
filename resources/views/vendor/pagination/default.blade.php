@if ($paginator->hasPages())
    <nav class="pagination clearfix">
        <ul class="page-numbers">
            {{-- Previous Page Link --}}
            {{--@if ($paginator->onFirstPage())--}}
                {{--<li class="page-numbers current"><i class="fa fa-home"></i></li>--}}
            {{--@else--}}
                {{--<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-numbers pagination__page pagination__icon pagination__page--next"><i class="ui-arrow-left"></i></a></li>--}}
            {{--@endif--}}

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__page pagination__page--current"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination__page">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

{{--            --}}{{-- Next Page Link --}}{{--
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="next page-numbers pagination__page pagination__icon pagination__page--next"><i class="ui-arrow-right"></i></a></li>
            @else
                <li class="disabled pagination__page pagination__icon pagination__page--next"><span><i class="ui-arrow-right"></i></span></li>
            @endif--}}
        </ul>
    </nav>
@endif

