@props(['link', 'class' => '', 'text' => '','style'=>''])


<a class="{{ $class }}" href="{{ $link }}" style="{{ $style }}">
    {{ $slot }}
    {{ $text }}
</a>
