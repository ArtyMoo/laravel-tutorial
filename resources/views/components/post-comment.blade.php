@props(['comment'])

<article class="flex p-10 bg-gray-300 text-black">
    <div>
        <img src="{{ $comment->author->avatar }}" alt="">
    </div>
    <div>
        <header>
            <h3 class="font-bold p-2">{{ $comment->author->username }}</h3>
            <p class="text-xs p-2">
                Posted <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>
        <p class="p-2 border-2 rounded-lg">
            {{ $comment->body }}
        </p>
    </div>
</article>
