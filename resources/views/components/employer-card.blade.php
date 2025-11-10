@props(['job','aditionalStyle','width' => ""])
<x-panel class="p-3 w-full hover:shadow-2xl hover:cursor-pointer">
    <div class="w-max space-x-1 m-auto">
        <a href="{{ $job->employer->name_slug }}">
            <x-employer-logo :employer="$job->employer" :width="$width" :aditionalStyle="$aditionalStyle"/>
        </a>
    </div>
</x-panel>
