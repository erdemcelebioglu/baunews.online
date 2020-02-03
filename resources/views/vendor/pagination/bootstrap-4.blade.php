@if ($paginator->hasPages())
    <ul class="page-numbers" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><span class="prev page-numbers" aria-hidden="true">&lsaquo;</span></li>
        @else
            <li><a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span class="page-numbers">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="page-numbers current">{{ $page }}</span></li>
                    @else
                        <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a></li>
        @else
            <li><span class="page-numbers" aria-hidden="true">&rsaquo;</span></li>
        @endif
    </ul>
@endif
