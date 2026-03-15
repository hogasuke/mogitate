@if ($paginator->hasPages())
    <div class="pagination">
        <nav>

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="page-arrow disabled">‹</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="page-arrow">‹</a>
            @endif


            {{-- Page Numbers --}}
            @foreach ($elements as $element)

                @if (is_string($element))
                    <span>{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())
                            <span class="page-number active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-number">{{ $page }}</a>
                        @endif

                    @endforeach
                @endif

            @endforeach


            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="page-arrow">›</a>
            @else
                <span class="page-arrow disabled">›</span>
            @endif

        </nav>
    </div>
@endif