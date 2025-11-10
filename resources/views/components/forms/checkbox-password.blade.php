@props(['label' => 'Show Password', 'type' => 'checkbox', 'targetId' => ''])


<div class="text-left">
    <input type="{{ $type }}" data-target="{{ $targetId }}" {{ $attributes }}>
    <span class="pl-1">{{ $label }}</span>
</div>
