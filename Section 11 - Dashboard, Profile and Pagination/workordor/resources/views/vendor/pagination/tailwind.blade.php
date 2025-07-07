@if ($paginator->hasPages())
    <nav class="flex justify-center pt-5" role="navigation">

        {{-- Previous link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-700 text-gray-400 rounded-l-lg">
                Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-l-lg">
                Previous
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-4 py-2 bg-gray-700 text-gray-400">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 text-white bg-blue-600">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="px-4 py-2 bg-gray-800 text-gray-300 hover:bg-blue-600 hover:text-white">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-r-lg">
                Next
            </a>
        @else
            <span class="px-4 py-2 bg-gray-700 text-gray-400 rounded-r-lg">
                Next
            </span>
        @endif
    </nav>
@endif
