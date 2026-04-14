@props(['data ' => '', 'aditionalStyle', 'width' => '', 'title' => ''])
<x-panel class="p-3 w-full hover:shadow-2xl hover:cursor-pointer">
    <div class="w-full">
        <a href="{{ $data->name_slug }}" class="w-full flex flex-col items-center justify-start">
            <x-employer-logo :employer="$data" :width="$width" :aditionalStyle="$aditionalStyle" />
            @if (request()->routeIs('company'))
                <p class="w-full text-balance">{{ $data->name }}</p>
            @endif
        </a>
    </div>
</x-panel>
