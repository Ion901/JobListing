@props(['link', 'class' => '', 'text' => ''])


<a class="{{ $class }}" href="{{ $link }}">
    {{ $slot }}
    {{ $text }}
</a>
