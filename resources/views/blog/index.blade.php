@extends('components.layout')
@section('content')
    @include('blog._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->isNotEmpty())
            <x-posts-grid :posts="$posts"></x-posts-grid>
{{--            {{ $posts->links()  }}--}}
            <x-pagination :posts="$posts"></x-pagination>
        @else
            <h1 class="text-center">There are no posts yet. We are working on it!</h1>
        @endif
    </main>
@endsection
