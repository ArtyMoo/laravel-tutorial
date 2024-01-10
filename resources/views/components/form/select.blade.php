@props(['label', 'name', 'current' => null])

<x-form.container label="{{ $current !== null ? $label . ' - Current: ' . $current : $label }}" name="{{ $name }}">
    <select name="{{ $name }}" id="{{ $name }}">
        {{ $slot }}
    </select>
</x-form.container>
