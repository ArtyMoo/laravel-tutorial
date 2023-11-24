@props(['posts'])

<div class="text-center">
{{--    @dd($posts->currentPage())--}}
    @if($posts->currentPage() > 1)
        <a href="/?{{
                http_build_query( request()->except('page') )
            }}&page={{ $posts->currentPage() - 1 }}">< Prev page</a>
    @else
        {{--  Gray out the Prev page button --}}
        <span class="text-gray-400">< Prev page</span>
    @endif
    |
    @if($posts->hasMorePages())
        <a href="/?{{
               http_build_query( request()->except('page') )
            }}&page={{
                $posts->currentPage() + 1
            }}">Next page >
        </a>
    @else
        {{--  Gray out the Next page  --}}
        <span class="text-gray-400">Next page ></span>
    @endif
</div>
