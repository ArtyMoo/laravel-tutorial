<div x-data="{ open: true }"
     x-init="setTimeout( () => open = false, 4000)"
     x-show="open"
     x-transition:leave.duration.500ms
     class="fixed bg-green-200 top-0 text-black w-full text-center p-3"
>
    <p>{{ session('success') }}</p>
</div>

