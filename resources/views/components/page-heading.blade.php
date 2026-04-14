@props(['class' => false])
@php
$default_class = "text-bold text-xl";

if($class){
    $class = implode(' ', array_merge(explode(' ', $class), explode(' ', $default_class)));
} else {
    $class = $default_class;
}
@endphp

<h1 class= "text-center mb-8 {{ $class ?? $default_class }}">{{ $slot }}</h1>
