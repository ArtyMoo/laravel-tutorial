@props(['heading'])

<section class="px-6 py-8 mx-auto">
    <h1 class="font-bold text-xl border-b">{{ $heading }}</h1>

    <div class="flex mt-2">
        <aside class="w-48">
            <h4 class="font-semibold mt-4 mb-4">Links</h4>

            <ul>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All posts</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New post</a>
                </li>
            </ul>
        </aside>
    </div>
    <main class="flex-1 max-w-6xl mx-auto bg-gray-200 p-10 rounded-xl">
        <x-panel>
            {{ $slot }}
        </x-panel>
    </main>
</section>
