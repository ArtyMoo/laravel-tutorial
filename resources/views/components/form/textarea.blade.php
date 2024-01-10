@props(['label', 'name', 'type' => 'text', 'cols', 'rows', 'value' => null])

<x-form.container label="{{ $label }}" name="{{ $name }}" type="{{ $type }}">
    <textarea class="borer border-gray-400 p-2 w-full text-gray-700"
              name="{{ $name }}"
              id="{{ $name }}"
              rows="{{ $rows }}"
              cols="{{ $cols }}"
    > {{ old($name) !== null ? old($name) : $value }}
    </textarea>
</x-form.container>
