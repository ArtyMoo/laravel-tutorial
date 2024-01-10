@extends('components.layout')

@section('content')
    <h1>A pogey post! </h1>
    <div class="emz-pog">
        <img src="{{ asset('storage/' . $post->thumbnail ) }}" alt="" srcset="">
    </div>
    <div class="blog">
        <h1>{{ $post->title }}</h1>
        <p>
            By <a class="author-name" href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a
                    href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
        <article>
            <!-- expects HTML code and not only a string -->
            <p>{!! $post->body !!}</p>
        </article>
        <p><a href="/">GO BACK, GO BACK!</a></p>
    </div>
    <section class="bg-gray-500">

        <x-write-a-comment :post_id="$post->id" :slug="$post->slug"></x-write-a-comment>

        @foreach($post->comments->sortByDesc('created_at') as $comment)
            <x-post-comment :comment="$comment"></x-post-comment>
        @endforeach
    </section>
@endsection
