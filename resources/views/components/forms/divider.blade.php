@props(['text' => ''])

@php
    $addOns = [
        'content' => "<div class=\"absolute inset-0 flex items-center\">
            <div class=\"w-full border-t border-gray-300\"></div>
        </div>
        <div class=\"relative flex justify-center text-sm\">
            <span class=\"bg-white dark:bg-gray-700 px-2 text-gray-500 dark:text-white\">Or continue
                with</span>
        </div>",
        'class' => 'relative',
    ];
@endphp

@if ($text)
    <div class={{ $addOns['class'] }}>
        {!! $addOns['content'] !!}
    </div>
@else
    <div>
        <div class="bg-white/10 my-10 h-px w-full"></div>
    </div>
@endif
