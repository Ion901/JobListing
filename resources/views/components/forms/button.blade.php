@props(['class' => "bg-blue-800 rounded py-2 px-6 font-bold"])

@php
    $defaults = [
        'class' => $class
    ];

@endphp
<button {{ $attributes($defaults) }}>{{ $slot }}</button>
