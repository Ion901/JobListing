@props(['class' => ''])

<button {{ $attributes->merge(['class' => "bg-blue-800 rounded py-2 px-6 font-bold $class"]) }}>
    {{ $slot }}
</button>
