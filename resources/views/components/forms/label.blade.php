@props(['name', 'label'])

<div class="inline-flex items-center gap-x-2">
    <label class="text-sm font-medium text-gray-700 dark:text-white" for="{{ $name }}">{{ $label }}</label>
</div>
