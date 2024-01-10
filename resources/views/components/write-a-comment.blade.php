@props(['post_id', 'slug'])

<article class="p-10 bg-gray-300 text-black">
    <div class="block">
        <h4 class="text-3xl"font>Write a comment</h4>
    </div>
    @auth()
        <form action="/{{ $slug }}/comment" method="post">
            @csrf
            <textarea
                id="comment"
                name="body"
                rows="4"
                class="mt-5 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here...">
            </textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="mt-5 bg-blue-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Publish</button>
        </form>
    @else
       <div class="mt-5">Want to write your thoughts about this post? Please
           <a href="/login" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">log in</a>.
       </div>
    @endauth
</article>
