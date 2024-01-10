@props(['label', 'name', 'type' => 'text', 'value' => null])

<x-form.container label="{{ $label }}" name="{{ $name }}" type="{{ $type }}">
    <input class="borer border-gray-400 p-2 w-full"
           type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) !== null ? old($name) : $value }}"
    />
</x-form.container>
