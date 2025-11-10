@props(['title','route'])
@php
    $class="w-fit relative flex items-center gap-1.5 font-[Open Sans] text-lg";

    if(str_contains(request()->path(), $route)){
        $class .= "before:content-[''] before:absolute before:left-0 before:-bottom-1 before:w-0 before:h-[2px] before:bg-blue-800 before:w-full";
    }else{
        $class .= "hover:before:content-[''] before:absolute before:left-0 before:-bottom-1 before:w-0 before:h-[2px] before:bg-blue-800 hover:before:w-full hover:before:transition-all hover:before:duration-300";
    }

@endphp


<a href="{{ route($route) }}" {{$attributes('class' => $class)}}>
    {{ $slot }}
<span>{{ $title }}</span>
</a>
