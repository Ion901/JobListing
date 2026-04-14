@props(['label', 'name','class' => null,'targetId' => null])

@php
    $defaults = [
        'type' => 'radio',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'class' => $class,
        'data-target' => $targetId
    ];
@endphp


<x-forms.field :$name>
    <div class="flex items-center">
        <input {{ $attributes($defaults) }}@checked(old($name) === "vacancy")>
        <span class="pl-1 text-m text-gray-900 dark:text-white">{{ $label }}</span>
    </div>
</x-forms.field>
