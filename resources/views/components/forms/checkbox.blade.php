@props(['label', 'name','class' => ""])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'class' => $class
    ];
@endphp

<x-forms.field :$name>
    <div class="flex items-center">
        <input {{ $attributes($defaults) }}>
        <span class="pl-1 text-sm text-gray-900 dark:text-white">{{ $label }}</span>
    </div>
</x-forms.field>

