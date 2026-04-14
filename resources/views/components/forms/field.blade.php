@props(['label' => '', 'name'])

<div>
    @if ($label)
        <x-forms.label :$name :$label />
    @endif

    <div class="mt-1 relative">
        {{ $slot }}

        <x-forms.error :error="$errors->first($name)" />
    </div>
</div>
