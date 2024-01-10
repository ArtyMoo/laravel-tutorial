@props(['label', 'name', 'cols', 'rows', 'type' => 'text'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
        {{ $label }}
    </label>
        {{ $slot  }}
    <x-form.error name="{{ $name }}"></x-form.error>
</div>
