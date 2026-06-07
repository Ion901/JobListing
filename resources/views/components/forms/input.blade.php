@props(['label' => '', 'name', 'class' => '', 'data_target' => null, 'type' => 'text'])

@php

    $default_class =
        'block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm';

    $class = implode(' ', array_merge(explode(' ', $class), explode(' ', $default_class)));

    $defaults = [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'class' => $class,
        'value' => old($name),
        'data-target' => $data_target
    ];

@endphp
<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
    {{ $slot }}
    </x-forms.field>

    
    @if ($type === 'password')
        @push('scripts')
            @vite('resources/js/toggleVisibility.js')
        @endpush
    @endif
