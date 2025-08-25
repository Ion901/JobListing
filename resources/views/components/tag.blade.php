@props(['tag','size' => 'base'])
@php
    $class = 'bg-white/10 py-1 font-bold rounded-xl hover:bg-white/25 transition-colors duration-300';
    if($size === 'base'){
        $class .= ' px-5 py-1 text-xs';
    }

    if($size === 'small'){
        $class .= ' px-3 py-1 text-2xs';
    }

@endphp


<a href="/tags/{{ strtolower($tag->name) }}" class="{{$class}}">{{$tag->name}}</a>
