<x-dropdown>
    <x-slot name="trigger">
        <button class="category-dropdown py-2 pl-3 pr-9 text-sm font-semibold text-left lg:w-32 w-full flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-down-arrow class="absolute pointer-events-none"></x-down-arrow>
        </button>
    </x-slot>
    <x-dropdown-item
        href="/"
        :active='!request()->input("category")'
    > All
    </x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query( request()->except('category', 'page') )}}"
            :active='request()->input("category") === $category->slug'
        >
            {{ ucwords($category->name)  }}

        </x-dropdown-item>
    @endforeach
</x-dropdown>
